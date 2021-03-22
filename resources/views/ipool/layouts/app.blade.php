<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{get_setting('website_name','Imgpool')}} Admin</title>
    <link rel="stylesheet" href="{{asset('ipool/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('ipool/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('ipool/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('ipool/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('ipool/assets/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('ipool/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('ipool/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{get_favicon()}}"/>
    @yield('styles')
</head>
<body>
<div class="container-scroller">
    @include('ipool.layouts.header')
    <div class="container-fluid page-body-wrapper">
        @include('ipool.layouts.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

</div>

<script>
    window.routes = {
        'user_status': '{{route('admin.user.status')}}',
        'user_store': '{{route('admin.user.store')}}',
        'page_destroy': '{{route('admin.page.index')}}',
        'file_destroy': '{{route('admin.file.index')}}',
        'message_destroy': '{{route('admin.message.index')}}',
    };
    window.text = {
        close: '{{__('page.admin_text_close')}}',
        verify: '{{__('page.admin_text_verify')}}',
        something_wrong: '{{__('page.admin_text_error')}}',
        user: {
            ban: '{{__('page.admin_text_ban')}}',
            unban: '{{__('page.admin_text_unban')}}',
            ban_verify: '{{__('page.admin_text_ban_verify')}}',
            unban_verify: '{{__('page.admin_text_unban_verify')}}',
        },
        page_delete: '{{__('page.admin_text_page_delete')}}',
        delete_verify: '{{__('page.admin_text_delete_verify')}}',
        message_delete: '{{__('page.admin_text_message_delete')}}',
        file_delete: '{{__('page.admin_text_file_delete')}}',
    }
</script>
<script src="{{asset('ipool/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('ipool/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{asset('ipool/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('ipool/assets/js/misc.js')}}"></script>
<script src="{{asset('ipool/assets/js/app.js')}}"></script>
@yield('scripts')
</body>
</html>
