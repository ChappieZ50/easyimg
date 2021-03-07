@extends('layouts.app')

@section('content')
    <div class="return-to-homepage">
        <a href="{{ route('home') }}" class="return-to-homepage">
            <i data-feather="arrow-left"></i>
            <span>Homepage</span>
        </a>
    </div>

    <div class="irob-login-wrapper container mt-5">
        <div class="irob-login-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="logo" class="img-fluid">
            </a>
        </div>
        <div class="irob-login col-xl-5 col-lg-8 col-md-10 col-sm-12 mx-auto">
            @error('non')
            <div class="mt-2 mb-4 alert alert-danger w-100" role="alert">
                {{$message}}
            </div>
            @enderror
            <div class="login-types-title">
                Sign in with
            </div>
            @component('components.social-login')

            @endcomponent
            <div class="login-types-title mt-4 mb-4">
                OR
            </div>
            <form action="{{route('user.login.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                           id="email" placeholder="Email Address">
                    @error('email')
                    <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="d-flex justify-content-between">
                        Password
                        <a href="#" class="text-right text-bold small">Reset your password</a>
                    </label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           name="password" id="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! app('captcha')->display() !!}
                    @error('g-recaptcha-response')
                    <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn rob-button w-100" type="submit">Sign In</button>
            </form>
        </div>
        <div class="to-register-page text-center mt-3 small">
            Don't have an account ? <a href="{{ route('user.register.index') }}">Register</a>
        </div>
    </div>
@endsection

@section('scripts')
    @if(config()->get('captcha.secret') && config()->get('captcha.sitekey'))
        {!! NoCaptcha::renderJs() !!}
    @endif
@append
