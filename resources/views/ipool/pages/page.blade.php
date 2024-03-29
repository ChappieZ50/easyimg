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
                @slot('title',isset($page) ? 'Update Page' : 'New Page')
                @slot('body')
                    <form action="{{isset($page) ? route('admin.page.update',$page->id) : route('admin.page.store')}}" method="POST">
                        @isset($page) @method('PUT') @endisset
                        @csrf
                        <div class="col-xl-6  col-lg-12 mt-5 mx-auto">
                            <div class="form-group">
                                <label for="page_title">Page Title</label>
                                <input type="text" class="form-control" id="page_title" name="title" value="{{isset($page) ? $page->title : old('title')}}">
                                @error('title')
                                <span class="invalid-feedback d-block mt-1 ml-2" role="alert">
                                   <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="page_slug">Page Slug</label>
                                <div class="input-group">
                                    <span class="input-group-text">{{url('/p/').'/'}}</span>
                                    <input type="text" name="slug" id="page_slug" class="remove-spaces form-control" value="{{isset($page) ? $page->slug : old('slug')}}">
                                    @error('slug')
                                    <span class="invalid-feedback d-block mt-1 ml-2" role="alert">
                                       <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="page_content">Page Content</label>
                                <textarea class="form-control" name="content" id="page_content">{!! isset($page) ? $page->content : old('content') !!}</textarea>
                                @error('content')
                                <span class="invalid-feedback d-block mt-1 ml-2" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group form-check-inline">
                                <div class="form-radio mr-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="type"
                                               value="default" {{isset($page) ? ($page->type == 'default' ? 'checked' : (!$page->type ? 'checked' : '')) : 'checked'}}>
                                        Default
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                                <div class="form-radio mr-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="type" value="contact" {{isset($page) && $page->type == 'contact' ? 'checked' : ''}}>
                                        Contact Page
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                                <div class="form-radio mr-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="type" value="terms" {{isset($page) && $page->type == 'terms' ? 'checked' : ''}}>
                                        Terms Page
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                                <div class="form-radio">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="type" value="privacy" {{isset($page) && $page->type == 'privacy' ? 'checked' : ''}}>
                                        Privacy Page
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg float-right">{{isset($page) ? 'Update Page' : 'Create Page'}}</button>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('ipool/assets/plugins/trumbowyg/trumbowyg.js')}}"></script>
    <script>
        $('#page_content').trumbowyg();
    </script>
@append

@section('styles')
    <link rel="stylesheet" href="{{asset('ipool/assets/plugins/trumbowyg/ui/trumbowyg.css')}}">
@append
