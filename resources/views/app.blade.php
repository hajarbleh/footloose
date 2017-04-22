<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">        
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/havaianas.css') }}">
        <link rel="icon" href="{{ url('assets/img/ui/favicon.png') }}">
        <title>@yield('title')</title>
    </head>
    <body>
        @yield('content')
    </body>
</html>