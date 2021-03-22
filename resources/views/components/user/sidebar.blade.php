<div class="ipool-sidebar col-xl-2 col-lg-2 col-md-12 col-sm-12">
    <ul>
        <li class="{{request()->routeIs('user.profile') ? 'active' : ''}}"><a href="{{route('user.profile')}}">{{__('page.user_sidebar_profile')}}</a></li>
        <li class="{{request()->routeIs('user.images') ? 'active' : ''}}"><a href="{{route('user.images')}}">{{__('page.user_sidebar_my_images')}}</a></li>
        <li class="{{request()->routeIs('user.statistic') ? 'active' : ''}}"><a href="{{route('user.statistic')}}">{{__('page.user_sidebar_statistics')}}</a></li>
        @if(auth()->user()->is_admin)
            <li><a href="{{route('admin.home')}}">{{__('page.user_sidebar_admin_panel')}}</a></li>
        @endif
        <li><a href="{{route('user.logout')}}">{{__('page.user_sidebar_logout')}}</a></li>
    </ul>
</div>
