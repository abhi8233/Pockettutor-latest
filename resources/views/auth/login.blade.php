@extends('layouts.app')

@section('content')
<div class="container login-form">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="fs-4 fw-bold mb-3">Sign in to your Pocketutor</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="col-form-label p-0 mb-1">{{ __('Email Id') }} <span class="pt-color-red pt-fs-16">*</span> </label>
                    <input id="email" type="email" placeholder="Enter Email id"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="col-form-label p-0 mb-1">{{ __('Password') }} <span class="pt-color-red pt-fs-16">*</span> </label>
                    <input id="password" type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- <div class="mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> -->

                <div class="mb-3">
                    <button type="submit" class="btn common-btn">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        @if (Route::has('password.request'))
                        <a class="p-0 text-decoration-none pt-color-black" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                        @endif
                    </div>

                    <div class="pt-color-black">
                        Haven't an account? <a class="p-0 text-decoration-none pt-color-primary" href="{{ route('register') }}">
                            {{ __('Sign Up') }}
                        </a>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection