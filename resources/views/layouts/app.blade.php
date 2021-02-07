<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Imgrob</title>

    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
</head>
<body>

@include('layouts.header')

<div class="page-wrapper container-fluid">
    @yield('content')
</div>

<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>
