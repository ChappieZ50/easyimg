@extends('irob.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            @component('irob.components.card')
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
                                    API
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-4">
                                    SEO
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content col-lg-10 col-md-12  mt-4">
                            <div class="tab-pane fade show active" id="tab-1">
                                <form class="w-100" action="" method="POST">
                                    <div class="row col-12">
                                        <div class="col-lg-6 col-md-12">
                                            <h4>Website Settings</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="website_name">Website Name</label>
                                                    <input type="text" class="form-control col-12" id="website_name"
                                                        name="website_name">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="google_analytics">Google Analytics</label>
                                                    <input type="text" class="form-control col-12" id="google_analytics"
                                                        name="google_analytics">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="max_file_size">Max File Size (MB)</label>
                                                    <input type="number" class="form-control col-12" id="max_file_size"
                                                        name="max_file_size">
                                                    <div class="small font-italic">Default: 5MB</div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="one_time_uploads">One Time Uploads</label>
                                                    <input type="number" class="form-control col-12" id="one_time_uploads"
                                                        name="one_time_uploads">
                                                    <div class="small font-italic">Default: 5</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="uploads_storage">Uploads Storage</label>
                                                <select name="uploads_storage" id="uploads_storage" class="form-control">
                                                    <option value="local">Local Storage</option>
                                                    <option value="aws">AWS Storage</option>
                                                </select>
                                                <div class="small font-italic">Default: Local Storage</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <h4>Dropzone Settings</h4>
                                            <hr>
                                            @csrf
                                            <div class="form-group">
                                                <label for="dropzone_text">Dropzone Text</label>
                                                <input type="text" class="form-control col-12" id="dropzone_text"
                                                    name="dropzone_text">
                                                <div class="small">add this attribute in your text:
                                                    <strong>%{browse}</strong>
                                                </div>
                                                <div class="small">Ex: Drop files here, paste or, %{browse}</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="browse_text">Browse Attribute Text</label>
                                                <input type="text" class="form-control col-12" id="browse_text" name="browse_text">
                                            </div>
                                            <div class="form-group">
                                                <label for="dropzone_rule">Dropzone Rule Text</label>
                                                <input type="text" class="form-control col-12" id="dropzone_rule"
                                                    name="dropzone_rule_text">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-lg float-right">Save Settings</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="tab-2">
                                <div class="row">
                                    <form class="col-12" action="" method="POST">
                                        <h4>Website Logo</h4>
                                        <hr>
                                        @csrf

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
