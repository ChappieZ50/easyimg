<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imgrob</title>

    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <a class="rob-button nav-link" href="{{url('/')}}">
        <i data-feather="upload"></i>
        Upload image
    </a>
    <a class="navbar-brand" href="{{url('/')}}">
        <img class="logo" src="{{asset('logo.png')}}" alt="logo">
    </a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Sign in</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rob-button rob-sign-up" href="#">
                <i data-feather="user-plus"></i>
                Sign up
            </a>
        </li>
    </ul>
</nav>
<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>
