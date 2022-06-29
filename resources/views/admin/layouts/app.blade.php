<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admox-Admin</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/images/favicon.ico')}}">

    <!-- CSS
 ============================================ -->


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/vendor/bootstrap.min.css')}}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/vendor/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendor/cryptocurrency-icons.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/plugins/plugins.css')}}">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/helper.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="{{asset('admin/css/style-primary.css')}}">

</head>

<body>

@include('admin.layouts.header')

@include('admin.layouts.sidebar')

@yield('body')

@include('admin.layouts.footer')

@include('admin.layouts.scripts')

</body>
</html>
