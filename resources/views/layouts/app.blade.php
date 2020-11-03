<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} @if(isset($title)) {{$title}} @endif</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@if(isset($description)) {{$description}} @endif">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/owl-carousel/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css">    
    <link rel="stylesheet" type="text/css" href="/css/design.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
    <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
</head>
<body>


@include('etc.navbar')

@yield('content')


<!-- commn code all page -->

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </span>
    </div>

@include('etc.footer')
    <script type="text/javascript" src="/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/slick/slick.min.js"></script>
    <script type="text/javascript" src="/js/slick-custom.js"></script>
    <script src="/js/parallax.js"></script>
    <script type="text/javascript" src="/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="/js/custom.js"></script>
    <script src="/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>
