@extends('layouts.app')

@section('site_title',' — Login')

@section('content')
    <div class="return-to-homepage">
        <a href="{{ route('home') }}" class="return-to-homepage">
            <i data-feather="arrow-left"></i>
            <span>{{__('page.login_homepage')}}</span>
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
                @slot('title',__('page.login_social'))
                @slot('bottom_title','OR')
            @endcomponent
            <form action="{{route('user.login.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">{{__('page.login_email')}}</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                           id="email" placeholder="{{__('page.login_email')}}" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{__('page.login_password')}}</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           name="password" id="password" placeholder="{{__('page.login_password')}}">
                    @error('password')
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
                <button class="btn ipool-button w-100" type="submit">Sign In</button>
            </form>
        </div>
        <div class="to-register-page text-center mt-3 small">
            {{__('page.login_create_account')}} <a href="{{ route('user.register.index') }}">{{__('page.login_register')}}</a>
        </div>
    </div>
@endsection

@section('scripts')
    @if(config()->get('captcha.secret') && config()->get('captcha.sitekey'))
        {!! NoCaptcha::renderJs() !!}
    @endif
@append
