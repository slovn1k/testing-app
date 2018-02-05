<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>

    {{--@section declares a section with a specific name--}}
    @section('content')
    {{--<div class="container">--}}
        {{--<h1>Contact page</h1>--}}
        {{--here we are echowing the parameter that we have passed to this view from the route--}}
        {{--<h2>{{$name}} {{$surname}}</h2>--}}
    {{--</div>--}}


    {{--here we are looping throw the people array using the blade foreach method--}}
    <ul>
        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach
    </ul>
    {{--@show declares to show the section above--}}
    @show
</body>
</html>
