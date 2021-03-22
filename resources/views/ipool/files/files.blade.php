@extends('ipool.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            @component('ipool.components.card')
                @slot('title', __('page.admin_images_title'))
                @slot('searchRoute', route('admin.file.index'))
                @slot('body')
                    @component('ipool.components.files')
                        @slot('username',true)
                        @slot('files',$files)
                    @endcomponent
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
