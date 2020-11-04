<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AstroRightWay Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/css/admin-style.css">
    <link rel="stylesheet" href="/css/admin-custom.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
   <script src="/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
@include('etc.adminNavbar')

@yield('content')

    <script type="text/javascript" src="/bootstrap/js/popper.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/admin-custom.js"></script>
    <script src="/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>
