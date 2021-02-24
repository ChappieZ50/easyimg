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
                Sign up with
            </div>
            <div class="login-types">
                <a href="#" class="login-type">
                    <div class="login-type-icon">
                        <i data-feather="facebook" stroke-width="1.5"></i>
                    </div>
                    <div class="login-type-title">Facebook</div>
                </a>
                <a href="#" class="login-type">
                    <div class="login-type-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8,10h-2.6l0,0H12v4h5.7c-0.8,2.3-3,4-5.7,4c-3.3,0-6-2.7-6-6s2.7-6,6-6c1.7,0,3.2,0.7,4.2,1.8l2.8-2.8C17.3,3.1,14.8,2,12,2C6.5,2,2,6.5,2,12s4.5,10,10,10s10-4.5,10-10C22,11.3,21.9,10.6,21.8,10z" />
                        </svg>
                    </div>

                    <div class="login-type-title">Google</div>
                </a>
            </div>
            <div class="login-types-title mt-4 mb-4">
                OR
            </div>
            <form action="{{ route('user.register.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{old('username')}}">
                    @error('username')
                        <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{old('email')}}">
                    @error('email')
                        <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirm_password"
                        placeholder="Confirm Password">
                    @error('password_confirmation')
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
                <button class="btn rob-button w-100" type="submit">Sign Up</button>
            </form>
        </div>
        <div class="to-register-page text-center mt-3 small">
            Already have an account ? <a href="{{ route('user.login.index') }}">Sign in</a>
        </div>
    </div>
@endsection

@section('scripts')
    {!! NoCaptcha::renderJs() !!}
    @append
