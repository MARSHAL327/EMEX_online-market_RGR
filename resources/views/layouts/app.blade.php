<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="<?=$_SERVER["HTTP_HOST"]; ?>/img/logo.svg" type="image/svg">
    <link rel="stylesheet" href="<?=$_SERVER["HTTP_HOST"]; ?>/css/reset.css">
    <link rel="stylesheet" href="<?=$_SERVER["HTTP_HOST"]; ?>/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?=$_SERVER["HTTP_HOST"]; ?>/Libs/slick.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="<?=$_SERVER["HTTP_HOST"]; ?>/Libs/jquery.js"></script>
    <script src="<?=$_SERVER["HTTP_HOST"]; ?>/Libs/sweetAlert.js"></script>
    <script type="text/javascript" src="<?=$_SERVER["HTTP_HOST"]; ?>/Libs/slick.js"></script>
    <script src="<?=$_SERVER["HTTP_HOST"]; ?>/js/app.js"></script>
    <title>@yield('title-block')</title>
</head>
<body>
<div class="black-bg"></div>
@include('inc.header-contact')
@include('inc.register')
@include('inc.login')
@if( $user != null && $user->role == "admin" )
    @include('admin.adminPanel')
@endif


<div class="wrapper" style="min-height: 800px">
    @include('inc.header')
    @yield('content')
</div>

@include('inc.footer')
</body>
</html>
