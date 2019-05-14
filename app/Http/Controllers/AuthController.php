<?php
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// POST and PUT Routes
////////////////////////////////////////////////////////////////////////////////

// Includes
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\AccountActivation;
use App\Mail\PasswordReset;
use App\User;
use App\UserInformation;
use App\Login;


// Route Collection Class
class AuthController extends Controller
{
    ////////////////////////////////////////////////////////////////////////////
    //  Public Functions

    // Login (Read)
    public function login(Request $request)
    {

        // Validate Form Input
        $request->validate([
            'email' => "required|email",
            'password' => "required"
        ]);

        // Fetch User by Email with "active" status...
        $user = User::where([
            "email" => $request->input('email'),
            "activation_status" => "active"
        ])->first();

        // Compare fetched User's Hash with Salted (fetched from DB) Hash of Inputted Pass. If pass...
        if (Hash::check($user->salt.$request->input('password'), $user->hash))
        {

            // Create a Unique Login Token
            $authentication_token = uniqid("", true);

            // Record new Login Event and Login Token to Database
            $login = new Login();
            $login->ip_address = $_SERVER["REMOTE_ADDR"];
            $login->token = $authentication_token;
            $login->user_id = $user->id;
            $login->save();

            // Set Login Token as Cookie
            setcookie("authentication_token", $authentication_token, time()+60*60*24);

            // Redirect to Profile Route
            return redirect("profile");
        }

        // Absent Password Match, return Login View with Error Messages:
        return view("login")->with([
            "incorrect_password" => "Incorrect password.",
            "email" => $request->input('email')
        ]);
    }


    // Register a New Account (Create)
    public function register(Request $request)
    {

        // Get Email for which Registration is requested...
        $email = $request->input('email');

        // Get a Count of Registrations of that Email, already registered.
        define("USER_COUNT", User::where("email", "=", $email)->count());

        // Validate Form Input
        $request->validate([
            'email' => [
                "bail",
                "required",
                "email",
                function($email, $value, $fail)
                {
                    // Stop Validation is Email is already registered.
                    if (USER_COUNT > 0)
                    {
                        $fail("This e-mail is already registered.");
                    }
                }
            ],
            'password' => [
                "required",
                "confirmed",
                "min:3",
                "regex:/[@$!%*#?&]{1,}/",
                "regex:/[0-9]{2,}/",
                "regex:/[a-zA-Z]{3,}/"
            ],
            'password_confirmation' => [
                "required"
            ]
        ]);

        // If validation passes, continue...

        // Create Salt for Password
        $salt = uniqid();

        // Hash the New User's Password with Salt
        $hash = Hash::make($salt.$request->input('password'));

        // Create a Unique Activation Token (to e-mail)
        $token = uniqid("", true);

        // Save a New User to Database
        $user = new User();
        $user->email = $email;
        $user->salt = $salt;
        $user->hash = $hash;
        $user->activation_status = $token;
        $user->save();

        // Send Activation E-mail to provided E-mail Address
        Mail::to($email)->send(new AccountActivation($email, $token));

        // Return a confirmation of completed step.
        return view('nextstep')->with([
            'email' => $email
        ]);
    }


    // Activate Account (Update)
    public function activate(Request $request)
    {

        // Validate Form Input
        $request->validate([
            "portrait" => "required|mimes:jpeg|dimensions:350,350",
            "first_name" => "required|alpha_dash",
            "last_name" => "required|alpha_dash",
            "gender" => "required",
            "date_of_birth" => [
                "required",
                "before_or_equal:".now()->subYears(18)->format('Y-m-d')
            ],
            "phone_number" => "required|numeric"
        ]);

        // If validation passes, continue...

        // Using provided Email and Token (from GET), update activation status.
        $user = User::where([
            ["email", "=", $request->input('email')],
            ["activation_status", "=", $request->input('token')]
        ])->first();
        $user->activation_status = "active";
        $user->save();

        // Insert newly provided (Required) User Information into Database.
        $user_information = new UserInformation();
        $user_information->portrait = $request->file("portrait")->store("portraits");
        $user_information->first_name = ucfirst(strtolower($request->input("first_name")));
        $user_information->last_name = ucfirst(strtolower($request->input("last_name")));
        $user_information->gender = substr($request->input("gender"), 0, 1);
        $user_information->date_of_birth = $request->input("date_of_birth");
        $user_information->phone_number = $request->input("phone_number");
        $user_information->user_id = $user->id;
        $user_information->save();

        // Redirect to Login Page with a Successful Activation Message.
        return redirect("login")->with([
            "success" => "Account activated successfully!"
        ]);
    }


    // Reset Password Authentication (Update)
    public function reset(Request $request)
    {

        // Validate Form Input
        $request->validate([
            'email' => "required|email",
            "phone_number" => "required|numeric"
        ]);

        // If validation passes, continue...

        // Find the User (Account) by E-mail...
        $user = User::where([
            "email" => $request->input('email')
        ])->first();

        // If the provided Phone Number (quasi-password) Matches the E-mail (Account)...
        if ($request->input('phone_number') === $user->user_information->phone_number)
        {

            // Create a New Activation Status Token
            $new_token = uniqid("", true);

            // Update the Database with the new Activation Status.
            $user->activation_status = $new_token;
            $user->save();

            // Use the provided and confirmed E-Mail...
            $email = $request->input('email');

            // ...send a Password Reset Email with the new Token.
            Mail::to($email)->send(new PasswordReset($email, $new_token));

            // ... return a Confirmation Message to the View.
            return view("reset")->with([
                "success" => "An E-mail with a password-reset link been sent to $email."
            ]);
        }

        // Abent a Credential Match, return an Error Message.
        return view("reset")->with([
            "failure" => "Invalid credentials."
        ]);
    }


    // Set New Password (Update)
    public function newpassword(Request $request)
    {

        // Validate Form Input
        $request->validate([
            'password' => [
                "required",
                "confirmed",
                "min:3",
                "regex:/[@$!%*#?&]{1,}/",
                "regex:/[0-9]{2,}/",
                "regex:/[a-zA-Z]{3,}/"
            ],
            'password_confirmation' => [
                "required"
            ]
        ]);

        // If validation passes, continue...

        // Select User from Database by E-mail and Activation Token.
        $user = User::where([
            ["email", "=", $request->get('email')],
            ["activation_status", "=", $request->get('token')]
        ])->first();

        // If the User Exists...
        if ($user)
        {
            // Create and Update New Salt
            $new_salt = uniqid("", true);
            $user->salt = $new_salt;

            // Update User Password, hashed with New Salt
            $user->hash = Hash::make($new_salt.$request->input('password'));
            $user->activation_status = "active";
            $user->save();

            // Redirect to Login Page with Confirmation of Successful Password Change.
            return view("login")->with([
                "success" => "Password updated successfully."
            ]);
        }

        // Absent proper credentials, return an Error Message.
        return view("newpassword")->with([
            "failure" => "Pasword could not be changed."
        ]);
    }
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
