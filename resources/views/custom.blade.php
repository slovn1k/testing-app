<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    {{--here we are extending the view contact and we can echo the section from there in this view--}}
    @extends('contact')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">
    <h1>Custom page</h1>
    {{--here we are displaying the content section from the contact view--}}
    @yield('content')
</div>
</body>
</html>
