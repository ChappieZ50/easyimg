@extends('layouts.app')

@section('content')
    <div class="irob-profile-wrapper col-md-10 col-sm-12">
        @component('components.user.sidebar') @endcomponent
        @component('components.user.profile') @endcomponent
    </div>
@endsection
