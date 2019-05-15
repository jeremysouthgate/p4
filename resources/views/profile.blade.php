@extends('layout')

@section('content')

    <!--  Content-Specific Styling -->
    <link href='./css/forms.css' rel='stylesheet'/>
    <link href='./css/profile.css' rel='stylesheet'/>


    <!--  Centered Content -->
    <div id='profile'>

        <!-- Authenticated Content... -->
        @if ($authenticated)

            <!-- Welcome Message -->
            <p>Hello, {{ $first_name }}, you are logged in!</p>

            <br />

            <!-- Profile Information -->
            <div id='information'>
                <p>Here is your private information:</p>
                <br />
                <p>Name: {{ $first_name }} {{ $last_name }}</p>
                <p>Email: {{ $email }}</p>
                <p>Phone: {{ $phone_number }}</p>
            </div>

            <!-- Logout Button -->
            <a id='logout' href='/logout'>Log Out</a>

        <!-- Guest Content... -->
        @else
            <p>You are logged out!</p>
            <a id='homepage' href='/'>Homepage</a>
        @endif

    </div>

@endsection
