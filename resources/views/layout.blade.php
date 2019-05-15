<!doctype html>
<!--

    SPARK ID™
    An AUTHORIZED LOGIN Program
    By: Jeremy C. Southgate (jes4532@g.harvard.edu)
    Copyright © ™ Jeremy C. Southgate. All rights reserved.

    In fulfillment of: HES CSCI E-15 Dynamic Web Applications, Project 4.
    And in partial fulfillment of: the degree of Bachelor of Liberal Arts
    in Extension Studies, Harvard University.

-->
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
