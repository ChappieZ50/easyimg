@extends('irob.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            @component('irob.components.card')
                @slot('title') Settings @endslot
                @slot('body')
                    <div class="row mt-3">
                        <ul class="nav nav-tabs col-lg-2 col-md-12 flex-column justify-content-between" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-selected="true">
                                    Website
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-selected="false">
                                    Logo & Favicon
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-selected="false">
                                    API
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-selected="false">
                                    SEO
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content col-md-10">
                            <div class="tab-pane fade" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
