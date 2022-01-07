@extends('layouts.app')

@section('content')
<div class="container forget-form">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="d-flex justify-content-center flex-column mb-3 text-center">
                <div class="mb-3 d-flex justify-content-center">
                    <span class="forget-icon-main position-relative">
                        <img src="{{URL::asset('assets/icons/key.svg')}}" class="pt-bg-primary p-3 pt-height-px-50 pt-width-px-50 pt-border-radius-px-30  position-relative" />
                    </span>
                </div>
                <div class="fs-4 fw-500 mb-3">{{ __('Forgot Password') }}</div>
                <div>Forgot your password ? Please enter your registered Email id to reset your password.</div>
            </div>

            <div class="">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="col-form-label p-0 mb-1">{{ __('Email Id') }} <span class="pt-color-red pt-fs-16">*</span></label>

                        <input id="email" type="email" placeholder="Enter Email id" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="">
                            <button type="submit" class="btn common-btn">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <div class="pt-color-black">
                            <a class="p-0 text-decoration-none pt-color-primary" href="{{ route('login') }}">
                                < {{ __('Back to Login') }} </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection