@extends('layout')

@section('content')

    <!--  Content-Specific Styling -->
    <link href='./css/forms.css' rel='stylesheet'/>


    <!--  Centered Content -->
    <div class='center_field'>

        <!-- FORM -->
        <form method="POST" action=''>

            <!-- CSRF Token and Method Spoof -->
            @csrf
            @method('PUT')

            <!-- Logo Header -->
            <a href='/'><img src='./images/sparkid.png' alt='Spark ID Logo'/></a>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Section Title Header -->
            <h1>New Password</h1>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Password -->
            <label>New Password</label>
            <input type='password' name='password' value="{{ old('password') }}" @if ($errors->get('password')) style='border: 1px solid red;' @endif/>
            @error('password')
                <small class='error'> {{ $errors->first('password') }} </small>
            @enderror

            <!-- Password Confirmation -->
            <label>Confirm New Password</label>
            <input type='password' name='password_confirmation' value="{{ old('password_confirmation') }}" @if ($errors->get('password_confirmation')) style='border: 1px solid red;' @endif/>
            @error('password_confirmation')
                <small class='error'> {{ $errors->first('password_confirmation') }} </small>
            @enderror

            <!-- SUBMIT FORM -->
            <input type='submit' name='reset' value='Reset Password'/>
            @if (isset($failure))
                {{ $failure }}
            @endif

            <!-- Spacer -->
            <div class='spacer50'></div>

            <!-- Prompt -->
            <p id='requirements'>
                <b>Password Requirements</b><br />
                1 or more symbols<br />
                2 or more numbers<br />
                3 or more letters<br />
                10 or more total characters<br />
            </p>

        </form>

    </div>

@endsection
