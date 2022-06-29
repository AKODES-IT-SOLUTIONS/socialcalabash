<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <title>@yield('title')</title>

<body>

@include('layouts.header')

@yield('body')

@include('layouts.footer')

@include('layouts.scripts')

</body>
</html>
