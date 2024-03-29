@extends('ipool.layouts.app')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            @component('ipool.components.card')
                @slot('title') Settings @endslot
                @slot('body')
                    <div class="row mt-3 align-items-start">
                        <ul class="nav nav-tabs col-lg-2 col-md-12 flex-column justify-content-between" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1">
                                    Website
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2">
                                    Logo & Favicon
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3">
                                    AWS API
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-4">
                                    Login & Recaptcha API
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-5">
                                    SEO
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content col-lg-10 col-md-12  mt-4">
                            <div class="tab-pane fade show active" id="tab-1">
                                @include('ipool.components.settings.tabs.website')
                            </div>

                            <div class="tab-pane fade" id="tab-2">
                                @include('ipool.components.settings.tabs.logo-favicon')
                            </div>

                            <div class="tab-pane fade" id="tab-3">
                                @include('ipool.components.settings.tabs.aws-api')
                            </div>

                            <div class="tab-pane fade" id="tab-4">
                                @include('ipool.components.settings.tabs.login-recaptcha-api')
                            </div>

                            <div class="tab-pane fade" id="tab-5">
                                @include('ipool.components.settings.tabs.seo')
                            </div>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
