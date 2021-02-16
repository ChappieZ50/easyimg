<div class="irob-sidebar col-xl-2 col-lg-2 col-md-12 col-sm-12">
    <ul>
        <li class="{{request()->routeIs('user.profile') ? 'active' : ''}}"><a href="{{route('user.profile')}}">Profile</a></li>
        <li class="{{request()->routeIs('user.images') ? 'active' : ''}}"><a href="#">My Images</a></li>
        <li><a href="{{route('home')}}">Upload Image</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
</div>
