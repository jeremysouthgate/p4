@extends('layout')

@section('content')

    <!--  Content-Specific Styling -->
    <link href='./css/welcome.css' rel='stylesheet'/>


    <!--  Centered Content -->
    <div class='center_field'>

        <!-- Container -->
        <div id='masthead'>

            <!-- Logo Header -->
            <a href=''><img src='./images/sparkid.png' alt='Spark ID Logo'/></a>

            <!-- Options -->
            <div id='options'>

                <!-- REGISTER -->
                <a href='/register' id='register'>REGISTER</a>

                &nbsp;&nbsp; | &nbsp;&nbsp;

                <!-- LOGIN -->
                <a href='/go' id='login'>LOGIN</a>

            </div>
        </div>

    </div>

@endsection
