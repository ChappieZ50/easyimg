@extends('layouts.app')

@section('content')
    @component('components.dropzone')  @endcomponent
@endsection

@section('scripts')
    <script src="{{asset('assets/js/dropzone.js')}}"></script>
@append
