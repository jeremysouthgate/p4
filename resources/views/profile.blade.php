@extends('layout')

@section('content')

    <!--  Content-Specific Styling -->
    <link href='./css/forms.css' rel='stylesheet'/>
    <link href='./css/profile.css' rel='stylesheet'/>


    <!--  Centered Content -->
    <div id='profile'>

        <!-- Authenticated Content... -->
        @if ($authenticated)
            <p>You are logged in!</p>
            <a id='logout' href='/logout'>Log Out</a>

        <!-- Guest Content... -->
        @else
            <p>You are logged out!</p>
            <a id='homepage' href='/'>Homepage</a>
        @endif

    </div>

@endsection
