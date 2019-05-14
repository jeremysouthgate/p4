@extends('layout')

@section('content')

    <!--  Content-Specific Styling -->
    <link href='./css/forms.css' rel='stylesheet'/>
    <link href='./css/activate.css' rel='stylesheet'/>


    <!--  Centered Content -->
    <div class='center_field'>

        <!-- FORM -->
        <form method="POST" action='' enctype="multipart/form-data">

            <!-- Logo Header -->
            <a href='/'><img src='./images/sparkid.png'/></a>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Section Title Header -->
            <h1>Registration, Step 2 of 2.</h1>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Propmpt -->
            <p>
                Your profile is not active and you will not be able to log in
                until this information is complete.
            </p>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Portrait -->
            <label>Portrait JPG (350 x 350px)</label>
            <input type='file' name='portrait' value="{{ old('portrait') }}" @if ($errors->get('portrait')) style='border: 1px solid red;' @endif/>
            @error('portrait')
                <small class='error'> {{ $errors->first('portrait') }} </small>
            @enderror

            <!-- First Name -->
            <label>First Name</label>
            <input type='text' name='first_name' value="{{ old('first_name') }}" @if ($errors->get('first_name')) style='border: 1px solid red;' @endif/>
            @error('first_name')
                <small class='error'> {{ $errors->first('first_name') }} </small>
            @endif

            <!-- Last Name -->
            <label>Last Name</label>
            <input type='text' name='last_name' value="{{ old('last_name') }}" @if ($errors->get('last_name')) style='border: 1px solid red;' @endif/>
            @error('last_name')
                <small class='error'> {{ $errors->first('last_name') }} </small>
            @enderror

            <!-- Gender -->
            <label>Gender</label>
            <select name='gender' @if ($errors->get('gender')) style='border: 1px solid red;' @endif>
                @if ($errors)
                    <option selected value="{{ old('gender') }}">{{ old('gender') }}</option>
                @else
                    <option selected disabled>&nbsp;</option>
                @endif
                <option value='Female'>Female</option>
                <option value='Male'>Male</option>
                <option value='Neutral'>Neutral</option>
            </select>
            @error('gender')
                <small class='error'> {{ $errors->first('gender') }} </small>
            @enderror

            <!-- Date of Birth -->
            <label>Date of Birth</label>
            <input type='date' name='date_of_birth' value="{{ old('date_of_birth') }}" @if ($errors->get('date_of_birth')) style='border: 1px solid red;' @endif/>
            @error('date_of_birth')
                <small class='error'> {{ $errors->first('date_of_birth') }} </small>
            @enderror

            <!-- Phone Number -->
            <label>Mobile Phone</label>
            <input type='tel' name='phone_number' value="{{ old('phone_number') }}" @if ($errors->get('phone_number')) style='border: 1px solid red;' @endif/>
            @error('phone_number')
                <small class='error'> {{ $errors->first('phone_number') }} </small>
            @enderror

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Propmpt -->
            <p>
                The above information will be stored as encrypted.
                More information can be customized in your Profile.
            </p>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- SUBMIT FORM -->
            <input id='activate' type='submit' name='activate' value='Activate Spark ID!'/>

            <!-- Spacer -->
            <div class='spacer25'></div>

            <!-- Hidden Inputs -->
            <input type='hidden' name='email' value="{{ $email }}"/>
            <input type='hidden' name='token' value="{{ $token }}"/>

        </form>
    </div>

@endsection
