<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <title> @yield('title' , "Home page")</title>
</head>
<body>  
    @yield('content')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-1.11.1.js')}}"> </script>
    @yield('script')
</body>
</html>