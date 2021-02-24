<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="page-items">
            <a class="rob-button nav-link" href="{{ url('/') }}">
                <i data-feather="upload"></i>
                Upload image
            </a>
            <button class="navbar-toggler collapsed border-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span> </span>
                <span> </span>
                <span> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Terms of Service </a>
                            <a class="dropdown-item" href="#">Privacy Policy</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo" src="{{ asset('logo.png') }}" alt="logo">
        </a>

        <div class="page-items login-items">
            @auth
                <ul class="navbar-nav rob-move-btn">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('assets/images/avatar.png') }}" alt="avatar" class="nav-user-avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right position-absolute shadow-lg"
                            aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('user.images') }}">My Images</a>
                            <a class="dropdown-item" href="{{ route('home') }}">Upload Image</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
            @else
                <a class="nav-link" href="{{ route('user.login.index') }}">Sign in</a>
                <a class="nav-link rob-button rob-sign-up rob-move-btn" href="{{ route('user.register.index') }}">
                    <i data-feather="user-plus"></i>
                    Sign up
                </a>
            @endauth

        </div>
    </nav>
</header>
<div class="mobile-navbar"></div>
