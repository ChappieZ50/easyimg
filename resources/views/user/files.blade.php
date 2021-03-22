@extends('layouts.app')

@section('site_title',' — '.__('page.user_sidebar_my_images'))

@section('content')
    <div class="ipool-user-wrapper col-md-10 col-sm-12">
        @component('components.user.sidebar') @endcomponent
        @component('components.user.files')
            @slot('files',$files)
        @endcomponent
    </div>
@endsection
