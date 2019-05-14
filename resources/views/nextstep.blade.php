@extends('layout')

@section('content')

    <!--  Content-Specific Styling -->
    <link href='./css/nextstep.css' rel='stylesheet'/>


    <!--  Centered Content -->
    <div class='center_field'>

        <!-- Containter -->
        <div id='message'>

            <!-- Logo Header -->
            <a href='/'><img src='./images/sparkid.png' alt='Spark ID Logo'/></a>

            <!-- Section Title Header -->
            <h1>Registration, Step 1 of 2 is Complete!</h1>

            <!-- Confirmation Message -->
            <p>
                An e-mail with a link to Step 2 has been sent to <b>@if (isset($email)) {{ $email }} @endif</b>.
                <br /><br />
                Keep going! You may now close this window.
            </p>
        </div>

    </div>

@endsection
