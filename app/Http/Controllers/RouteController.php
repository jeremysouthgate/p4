<?php
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// GET Routes
////////////////////////////////////////////////////////////////////////////////

// Includes
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Login;
use Illuminate\Support\Facades\Auth;


// Route Collection Class
class RouteController extends Controller
{
    ////////////////////////////////////////////////////////////////////////////
    //  Private Functions

    // Control Access to View via Email and (temp) Token Requirement
    private function verified_token_view($request, $complete)
    {
        // GET E-Mail and Token
        $email = $request->get("email");
        $token = $request->get("token");

        // If GET Inputs exist...
        if (isset($email) && isset($token))
        {

            // Select User from Database by E-mail and Token match...
            $result = User::where([
                ["email", "=", $email],
                ["activation_status", "=", $token]
            ])->firstOrFail();

            // Confirm Credential Match...
            if ($email === $result->email && $token === $result->activation_status)
            {
                // Allow Access to View, and pass values....
                return view($complete)->with([
                    "email" => $email,
                    "token" => $token
                ]);
            }
        }

        // Absent Credentials, return a 404 Error.
        return abort(404);
    }


    ////////////////////////////////////////////////////////////////////////////
    //  Public Functions

    // Welcome Page
    public function welcome_page()
    {
        return view("welcome");
    }


    // Registration Page
    public function registration_page()
    {
        return view("register");
    }


    // Registration Step 1 of 2 Complete Confirmation Page
    public function nextstep()
    {
        return view("nextstep");
    }


    // Registration Step 2 of 2 Page
    public function activation_page(Request $request)
    {
        // Page Only Viewable with E-Mail and Token
        return $this->verified_token_view($request, "activate");
    }


    // Login Page
    public function login_page()
    {
        return view("login");
    }


    // Reset Password Page (Authentication)
    public function reset_page()
    {
        return view("reset");
    }


    // Profile Page (Read)
    public function profile()
    {

        // If a Client Session Cookie exists...
        if (isset($_COOKIE['authentication_token']))
        {

            // Lookup Latest Login of IP Address...
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $login = Login::where([
                ["ip_address", "=", $ip_address]
            ])->orderBy("created_at", "DESC")->firstOrFail();

            // If Latest Login from IP matches Client Session Login Token...
            if ($login->token === $_COOKIE['authentication_token'])
            {
                // Return Profile with Access.
                return view("profile")->with("authenticated", true);
            }
        }

        // Absent Authentication via Client Session Cookie, return Profile Without Access.
        return view("profile")->with("authenticated", false);
    }


    // Set New Password Page
    public function newpassword(Request $request)
    {
        // Page Only Viewable with E-Mail and Token
        return $this->verified_token_view($request, "newpassword");
    }


    // Logout (Update)
    public function logout()
    {
        // If Session Cookie Exists...
        if ($_COOKIE['authentication_token'])
        {
            // Expire and Unset (Delete) Authentication Cookie
            setcookie("authentication_token", $_COOKIE['authentication_token'], time()-1);
            unset($_COOKIE['authentication_token']);
        }

        // In any event, return to Profile (Without Access)
        return redirect("profile");
    }
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
