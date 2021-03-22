@extends('layouts.app')

@section('site_title',' — Register')

@section('content')
    <div class="return-to-homepage">
        <a href="{{ route('home') }}" class="return-to-homepage">
            <i data-feather="arrow-left"></i>
            <span>{{__('page.register_home')}}</span>
        </a>
    </div>
    <div class="ipool-login-wrapper container mt-5">
        <div class="ipool-login-logo">
            <a href="{{ route('home') }}">
                <img src="{{get_logo()}}" alt="logo" class="img-fluid">
            </a>
        </div>
        <div class="ipool-login col-xl-5 col-lg-8 col-md-10 col-sm-12 mx-auto">
            @error('non')
            <div class="mt-2 mb-4 alert alert-danger w-100" role="alert">
                {{$message}}
            </div>
            @enderror
            @component('components.social-login')
                @slot('title',__('page.register_social'))
                @slot('bottom_title','OR')
            @endcomponent
            <form action="{{ route('user.register.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">{{__('page.register_username')}}</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="{{__('page.register_username')}}" value="{{old('username')}}">
                    @error('username')
                    <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{__('page.register_email')}}</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="{{__('page.register_email')}}" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{__('page.register_password')}}</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="{{__('page.register_password')}}">
                    @error('password')
                    <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm_password">{{__('page.register_password_confirm')}}</label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirm_password"
                           placeholder="{{__('page.register_password_confirm')}}">
                    @error('password_confirmation')
                    <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-center">
                    {!! app('captcha')->display() !!}
                    @error('g-recaptcha-response')
                    <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn ipool-button w-100" type="submit">{{__('page.register_sign_up')}}</button>
            </form>
        </div>
        <div class="to-register-page text-center mt-3 small">
            {{__('page.register_account_exists')}} <a href="{{ route('user.login.index') }}">{{__('page.register_sign_in')}}</a>
        </div>
    </div>
@endsection

@section('scripts')
    @if(config()->get('captcha.secret') && config()->get('captcha.sitekey'))
        {!! NoCaptcha::renderJs() !!}
    @endif
@append
