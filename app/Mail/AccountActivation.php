<?php

// Namespace
namespace App\Mail;


// Includes
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


// Account Activation E-mail Class
class AccountActivation extends Mailable
{
    use Queueable, SerializesModels;

    // Use E-mail and Token within Class.
    protected $email;
    protected $token;

    // Construct from provided Email and Token
    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    // Build the E-Mail Message...
    public function build()
    {

        // And Send E-mail with properties:
        return $this->from("accounts@sparkid.org")
                    ->view("emails.account_activation")
                    ->with(["email" => $this->email, "activation_token" => $this->token]);

    }
}
