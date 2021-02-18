@extends('layouts.app')

@section('content')
    <div class="irob-user-wrapper col-md-10 col-sm-12">
        @component('components.user.sidebar') @endcomponent
        @component('components.user.images') @endcomponent
    </div>
@endsection
