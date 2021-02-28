@extends('layouts.app')

@section('content')
    <div class="irob-user-wrapper col-md-10 col-sm-12">
        @component('components.user.sidebar') @endcomponent
        @component('components.user.files')
            @slot('files',$files)
        @endcomponent
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/lightbox.js')}}"></script>
@append

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
@append