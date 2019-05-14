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
    <link rel='stylesheet' href="{{URL::asset('./css/layout.css')}}"/>

</head>
<body>

    <!-- Content/Components -->
    @yield('content')

</body>
</html>
