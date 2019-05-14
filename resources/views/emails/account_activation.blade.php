<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- HTML Required Tags -->
    <title>Spark ID</title>
    <meta charset="utf-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Adobe Font -->
    <link rel="stylesheet" href="https://use.typekit.net/sxk0fde.css">

    <!-- Style -->
    <style>
        body
        {
            background: #EAEAEA;
            width: calc(100% - 110px);
            min-width: 450px;
            height: auto;
            min-height: 600px;
            border-radius: 3px;
            padding: 50px;
            font-family: proxima-nova;
        }
            #header
            {
                width: 100%;
                height: auto;
                display: block;
                float: left;
            }
                #logo
                {
                    width: 250px;
                    height: auto;
                    display: block;
                    margin: 0 auto 0 auto;
                    padding: 50px 0 50px 0;
                }
            #message
            {
                width: calc(100% - 200px);
                height: auto;
                display: block;
                float: left;
                padding: 0 100px 0 100px;
            }
                #message a
                {
                    font-size: 25px;
                }
    </style>

</head>
<body>

    <!-- Logo Letterhead -->
    <div id='header'>
        <img id='logo' src='http://soundsparkstudios.com/images/sparkid.png' alt='Spark ID Logo'/>
    </div>

    <!-- E-mail Message -->
    <div id='message'>

        <!-- Message Header -->
        <h1>Account Verification</h1>


        <!-- Message Content -->

        <!-- Active Link if E-mail and Token are available. -->
        <a @if(isset($email) && isset($activation_token)) href="http://p4.sss1.me/activate?email={{ $email }}&token={{ $activation_token }}" @endif>Click this link to verify your e-mail and continue to registration Step 2!</a>

        <!-- "Close This Window" Prompt -->
        <p>
            This is a one-time activation e-mail. If you didn't sign up for an account, you can safely ignore this e-mail.
        </p>

    </div>

</body>
</html>
