@extends('layout')

@section('content')

    <!--  Content-Specific Styling -->
    <link href='./css/forms.css' rel='stylesheet'/>


    <!--  Centered Content -->
    <div class='center_field'>

        <!-- FORM -->
        <form method="POST" action=''>

            <!-- CSRF Token -->
            @csrf

            <!-- Logo Header -->
            <a href='/'><img src='./images/sparkid.png'/></a>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Section Title Header -->
            <h1>Reset Password</h1>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Guest -->
            @if (!isset($success))

                <!-- Failure Message (if any) -->
                @if(isset($failure))
                    <small class='error'>{{ $failure }}</small>
                @endif

                <!-- E-Mail -->
                <label>E-mail</label>
                <input type='text' name='email' value="{{ old('email') }}" @if ($errors->get('email')) style='border: 1px solid red;' @endif/>
                @error('email')
                    <small class='error'> {{ $errors->first('email') }} </small>
                @enderror

                <!-- Phone Number -->
                <label>Phone Number</label>
                <input type='text' name='phone_number' value="{{ old('phone_number') }}" @if ($errors->get('phone_number')) style='border: 1px solid red;' @endif/>
                @error('phone_number')
                    <small class='error'> {{ $errors->first('phone_number') }} </small>
                @enderror

                <!-- SUBMIT FORM -->
                <input type='submit' name='reset' value='Reset Password'/>

            @else

                <!-- Success Message (if any) -->
                <p>
                    {{ $success }}
                </p>
                
            @endif

        </form>

    </div>

@endsection
