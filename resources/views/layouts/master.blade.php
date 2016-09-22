<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-70x70.png">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('/favicon.ico" ')}}" type="image/x-icon">
    <link rel="mainfest" href="{{asset('img/logo/manifest.json" ')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('img/logo/apple-touch-icon.png')}}">
    <link rel="icon" href="{{URL :: to('img/logo/android-icon-48x48.png')}}">
    <link rel="icon" type="image/png" href="{{URL :: to('img/logo/apple-icon-60x60.png')}}">
    <link id="data-uikit-theme" rel="stylesheet" href="{{asset('css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="stylesheet" href="{{URL :: to('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/search.min.css')}}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>




@yield('body')


@include('partials._footer')
<!-- Placed at the end of the document so the pages
    load faster -->
<script src="{{asset( 'js/jquery.min.js' )}}"></script>
<script src="{{asset( 'js/uikit.min.js' )}}"></script>
<script src="{{asset( 'js/main.js' )}}"></script>
<script src="{{asset( 'js/search.min.js' )}}"></script>
<script src="{{asset( 'js/sticky.min.js' )}}"></script>
<script src="{{asset( 'js/app.js' )}}"></script>
<script src="{{asset( 'js/pagination.min.js' )}}"></script>




</body>
</html>