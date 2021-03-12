<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('admin.home')}}">
            <img src="{{get_logo()}}" alt="logo" style="width: 140px;"/> </a>
        <a class="navbar-brand brand-logo-mini" href="{{route('admin.home')}}">
            <img src="{{get_logo()}}" alt="logo" style="width: 100%;"/> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{avatar_url(auth()->user()->avatar)}}" alt="{{auth()->user()->username}}"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="{{avatar_url(auth()->user()->avatar)}}" alt="{{auth()->user()->username}}">
                        <p class="mb-1 mt-3 font-weight-semibold">{{auth()->user()->username}}</p>
                        <p class="font-weight-light text-muted mb-0">{{auth()->user()->email}}</p>
                    </div>
                    <a href="{{route('user.profile')}}" class="dropdown-item">My Profile <i class="dropdown-item-icon ti-dashboard"></i></a>
                    <a href="{{route('admin.message.index')}}" class="dropdown-item">Messages<i class="dropdown-item-icon ti-comment-alt"></i></a>
                    <a href="{{route('home')}}" class="dropdown-item">Website Home<i class="dropdown-item-icon ti-comment-alt"></i></a>
                    <a href="{{route('user.logout')}}" class="dropdown-item">Logout<i class="dropdown-item-icon ti-power-off"></i></a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
