@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">

                <div class="fs-4 fw-bold mb-3">{{ __('Register') }}</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label p-0 mb-1">{{ __('Select an Option') }} <span class="pt-color-red pt-fs-16">*</span></label>
                        <div class="d-flex">
                            <div class="me-5">
                                <input type="radio" name="role" value="Tutor" checked> {{ __('Tutor') }}
                            </div>
                            <div class="">
                                <input type="radio" name="role" value="Student"> {{ __('Student') }}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="col-form-label p-0 mb-1">{{ __('First Name') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="col-form-label p-0 mb-1">{{ __('Last Name') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="col-form-label p-0 mb-1">{{ __('E-Mail Address') }} <span class="pt-color-red pt-fs-16">*</span></label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="col-form-label p-0 mb-1">{{ __('Password') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password-confirm" class="col-form-label p-0 mb-1">{{ __('Confirm Password') }} <span class="pt-color-red pt-fs-16">*</span></label>


                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="col-md-6">
                            <label for="language_id" class="col-form-label p-0 mb-1">{{ __('Language') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control language_id" name="language_id">
                                <option> Select Language</option>
                                
                            </select>
                           
                        </div>
                    </div>

                    <div class="row mb-3 tutor_field">
                        <div class="col-md-6">
                            <label for="field_of_interest" class="col-form-label p-0 mb-1">{{ __('Field of Interest') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control field_of_interest" name="field_of_interest">
                                <option> Select Field of Interest</option>
                                
                            </select>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="country_id" class="col-form-label p-0 mb-1">{{ __('Country') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control country_id" name="country_id">
                                <option> Select Country</option>
                                
                            </select>
                            
                        </div>
                    </div>

                    <div class="row mb-3 tutor_field">

                        <div class="col-md-6">
                            <label for="state_id" class="col-form-label p-0 mb-1">{{ __('State') }} <span class="pt-color-red pt-fs-16">*</span></label>


                            <select class="form-control state_id" name="state_id">
                                <option> Select State</option>

                            </select>
                            
                        </div>
                    </div>

                    
<div class="mb-3 subscription" style="display: block;">
                        <div class="d-flex wrapper justify-content-between">
                                                        
                                <input type="radio" id="option-Basic" name="subscription_id" value="1">
                                <label for="option-Basic" class="option">
                                    <div class="k-width-p-100">
                                        <div class="pt-font-size-px-16">Basic</div>
                                        <div class="pt-font-size-px-16">$44.99</div>
                                        <div class="pt-font-size-px-14">Minutes :90</div>
                                    </div>
                                </label>

                                                        
                                <input type="radio" id="option-Plus" name="subscription_id" value="2">
                                <label for="option-Plus" class="option">
                                    <div class="k-width-p-100">
                                        <div class="pt-font-size-px-16">Plus</div>
                                        <div class="pt-font-size-px-16">$74.99</div>
                                        <div class="pt-font-size-px-14">Minutes :180</div>
                                    </div>
                                </label>

                                                        
                                <input type="radio" id="option-Premium" name="subscription_id" value="3">
                                <label for="option-Premium" class="option">
                                    <div class="k-width-p-100">
                                        <div class="pt-font-size-px-16">Premium</div>
                                        <div class="pt-font-size-px-16">$114.99</div>
                                        <div class="pt-font-size-px-14">Minutes :300</div>
                                    </div>
                                </label>

                                                        
                                <input type="radio" id="option-Mentor" name="subscription_id" value="4">
                                <label for="option-Mentor" class="option">
                                    <div class="k-width-p-100">
                                        <div class="pt-font-size-px-16">Mentor</div>
                                        <div class="pt-font-size-px-16">$299.99</div>
                                        <div class="pt-font-size-px-14">Minutes :900</div>
                                    </div>
                                </label>

                                                    </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Accept <span class="pt-color-primary">Terms & Conditions</span> and <span class="pt-color-primary">Privacy Policy</span>
                        </label>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-center pt-width-p-80 my-0 mx-auto">
                            <button type="submit" class="btn common-btn">
                                {{ __('Create Account') }}
                            </button>
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <div class="pt-color-black">
                            Already have an account? <a class="p-0 text-decoration-none pt-color-primary" href="{{ route('login') }}">
                                {{ __('Sign in') }}
                            </a>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js-hooks')
<script>
    $(document).ready(function() {
        

        $('input:radio[name=role]').change(function() {
            if (this.value == 'Tutor') {
               
                $('.tutor_field').addClass('d-flex');
                $('.subscription').addClass('d-none');
                $('.tutor_field').removeClass('d-none');
                // $('.subscription').removeClass('d-flex');
            }
            if (this.value == 'Student') {

                $('.tutor_field').addClass('d-none');
                $('.subscription').css('display', 'block');
                $('.tutor_field').removeClass('d-flex');
                $('.subscription').removeClass('d-none');
            }
        });
    })
</script>
@endpush