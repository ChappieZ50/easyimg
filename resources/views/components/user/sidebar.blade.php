<div class="ipool-sidebar col-xl-2 col-lg-2 col-md-12 col-sm-12">
    <ul>
        <li class="{{request()->routeIs('user.profile') ? 'active' : ''}}"><a href="{{route('user.profile')}}">Profile</a></li>
        <li class="{{request()->routeIs('user.images') ? 'active' : ''}}"><a href="{{route('user.images')}}">My Images</a></li>
        <li class="{{request()->routeIs('user.statistic') ? 'active' : ''}}"><a href="{{route('user.statistic')}}">Statistics</a></li>
        @if(auth()->user()->is_admin)
            <li><a href="{{route('admin.home')}}">Admin Panel</a></li>
        @endif
        <li><a href="{{route('user.logout')}}">Logout</a></li>
    </ul>
</div>
