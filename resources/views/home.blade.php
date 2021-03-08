@extends('layouts.app')

@section('content')
   
    @component('components.ads.top-ad') @endcomponent

    @component('components.dropzone') @endcomponent

    @component('components.ads.bottom-ad') @endcomponent

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
@append
