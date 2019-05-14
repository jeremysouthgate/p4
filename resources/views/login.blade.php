@extends('layout')

@section('content')

    <!--  Content-Specific Styling -->
    <link href='./css/forms.css' rel='stylesheet'/>
    <link href='./css/login.css' rel='stylesheet'/>


    <!--  Centered Content -->
    <div class='center_field'>

        <!-- FORM -->
        <form method="POST" action='/login'>

            <!-- CSRF Token -->
            @csrf

            <!-- Logo Header -->
            <a href='/'><img src='./images/sparkid.png'/></a>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Section Title Header -->
            <h1>Login</h1>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Success Message (if any) -->
            @if (isset($success))
                <small class='success'>{{ $success }}</small>
            @endif

            <!-- E-Mail -->
            <label>E-mail</label>
            <input type='text' name='email' @if (isset($email)) value="{{ $email }}" @endif @if ($errors->get('email')) value="{{ old('email') }}" style='border: 1px solid red;' @endif/>
            @error('email')
                <small class='error'> {{ $errors->first('email') }} </small>
            @enderror

            <!-- Password -->
            <label>Password</label>
            <input type='password' name='password' @if ($errors->get('password')) style='border: 1px solid red;' @endif/>
            @error('password')
                <small class='error'> {{ $errors->first('password') }} </small>
            @enderror

            <!-- Failure Message (if any) -->
            @if (isset($incorrect_password))
                <small class='error'> {{ $incorrect_password }} </small>
            @endif

            <!-- SUBMIT FORM -->
            <input type='submit' name='authenticate' value='Authenticate'/>

            <!-- Reset Password Link -->
            <a href='/reset' id='forgot_password'>...or reset password.</a>

        </form>

    </div>

@endsection
