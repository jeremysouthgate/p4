@extends('layout')

@section('content')

    <!--  Content-Specific Styling -->
    <link href='./css/forms.css' rel='stylesheet'/>


    <!--  Centered Content -->
    <div class='center_field'>

        <!-- FORM -->
        <form method="POST" action='/register'>

            <!-- CSRF Token -->
            @csrf

            <!-- Logo Header -->
            <a href='/'><img src='./images/sparkid.png' alt='Spark ID Logo'/></a>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Section Title Header -->
            <h1>Registration</h1>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- E-Mail -->
            <label>E-mail</label>
            <input type='text' name='email' value="{{ old('email') }}" @if ($errors->get('email')) style='border: 1px solid red;' @endif/>
            @error('email')
                <small class='error'> {{ $errors->first('email') }} </small>
            @enderror

            <!-- Password -->
            <label>Password</label>
            <input type='password' name='password' value="{{ old('password') }}" @if ($errors->get('password')) style='border: 1px solid red;' @endif/>
            @error('password')
                <small class='error'> {{ $errors->first('password') }} </small>
            @enderror

            <!-- Password Confirmation -->
            <label>Confirm Password</label>
            <input type='password' name='password_confirmation' value="{{ old('password_confirmation') }}" @if ($errors->get('password_confirmation')) style='border: 1px solid red;' @endif/>
            @error('password_confirmation')
                <small class='error'> {{ $errors->first('password_confirmation') }} </small>
            @enderror

            <!-- SUBMIT FORM -->
            <input type='submit' name='register' value='I want to Register!'/>

            <!-- Spacer -->
            <div class='spacer50'></div>

            <!-- Prompt -->
            <p id='requirements'>
                <b>Password Requirements</b><br />
                1 or more symbols<br />
                2 or more numbers<br />
                3 or more letters<br />
                10 or more total characters<br />
                <br />
                <b>Age Requirement</b><br />
                You must be age 18 or older to use this service.<br />
                <br />
                <b>Terms and Conditions</b><br />
                By proceeding, you indicate your agreement to the
                <a href=''><u>Terms and Conditions of Service</u></a> and
                <a href=''><u>Pricacy Policy</u></a>. This includes agreeing to our use of <a><u>Cookies</u></a>.
            </p>

        </form>

    </div>

@endsection
