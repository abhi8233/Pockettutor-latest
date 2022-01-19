@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">

                <div class="fs-4 fw-bold mb-3">{{ __('Register') }}</div>
                <!-- action="{{ route('register') }}" -->
                <div class="mb-3">
                    <label for="name" class="col-form-label p-0 mb-1">{{ __('Select an Option') }} <span class="pt-color-red pt-fs-16">*</span></label>
                    <div class="d-flex">
                        <div class="me-5">
                            <input type="radio" name="role" id="tutor" value="Tutor" checked > {{ __('Tutor') }}
                        </div>
                        <div class="">
                            <input type="radio" name="role" id="student" value="Student" > {{ __('Student') }}
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}" id="frm-register-tutor" >
                    @csrf
                    <input type="hidden" name="role" id="tutor" value="Tutor" checked >
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="col-form-label p-0 mb-1">{{ __('First Name') }} <span class="pt-color-red pt-fs-16">*</span></label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="name" autofocus>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="col-form-label p-0 mb-1">{{ __('Last Name') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="name" autofocus>

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


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="country_id" class="col-form-label p-0 mb-1">{{ __('Country') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <div id="country_stud_div">
                                <select class="form-control country_id select2 @error('country_id') is-invalid @enderror" name="country_id" id="country_id" data-placeholder="Select Country">
                                    <option value=""> Select Country</option>
                                </select>
                            </div>

                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="col-form-label p-0 mb-1">{{ __('Password') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="password-confirm" class="col-form-label p-0 mb-1">{{ __('Confirm Password') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="institution" class="col-form-label p-0 mb-1">{{ __('Institution') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input type="text" class="form-control institution  @error('institution') is-invalid @enderror" name="institution" id="institution" value="{{ old('institution') }}">
                            
                            @error('institution')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6" >
                            <label  for="password" class="col-form-label p-0 mb-1">{{ __('Country of Institution') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <div id="country_institution_div">
                                <select class="form-control country_institution select2 @error('country_institution') is-invalid @enderror" name="country_institution" id="country_institution" data-placeholder="Select Country of Institution" onchange="getState(this)">
                                    <option value=""> Select Country of Institution</option>
                                </select>
                            </div>
                           
                            @error('country_institution')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="col-form-label p-0 mb-1">{{ __('State of Institution') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <div id="state_institution_div">
                                <select class="form-control state_institution select2 @error('state_institution') is-invalid @enderror" name="state_institution" id="state_institution" data-placeholder="Select State of Institution">
                                    <option value=""> Select State of Institution</option>
                                </select>
                            </div>

                            @error('state_institution')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="city_institution" class="col-form-label p-0 mb-1">{{ __('City of Institution') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <div id="city_institution_div">
                                <select class="form-control city_institution select2 @error('city_institution') is-invalid @enderror" name="city_institution" id="city_institution" data-placeholder="Select City of Institution">
                                    <option value=""> Select City of Institution</option>
                                </select>
                            </div>

                            @error('city_institution')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="specialization" class="col-form-label p-0 mb-1">{{ __('
                                Specialization') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control specialization select2  @error('specialization') is-invalid @enderror" name="specialization" data-placeholder="Select Specialization">
                                <option value=""> Select Specialization</option>
                                @foreach(\App\Models\Specialization::All() as $specialization)
                                <option value="{{$specialization->id}}" {{ $specialization->id == old('specialization') ? 'selected' :'' }}>{{$specialization->name}}</option>
                                @endforeach
                            </select>

                            @error('specialization')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="language_id" class="col-form-label p-0 mb-1">{{ __('Language') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control language_id @error('language_id') is-invalid @enderror" name="language_id">
                                <option value=""> Select Language</option>
                                @foreach(\App\Models\Languages::all() as $language)
                                    <option value="{{$language->id}}" {{ $language->id == old('language_id') ? 'selected' :'' }}>{{$language->name}}</option>
                                @endforeach
                            </select>

                            @error('language_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input @error('privacy_policy') is-invalid @enderror" type="checkbox" value="1" id="privacy_policy" name="privacy_policy" >

                        <label class="form-check-label" for="privacy_policy">
                            Accept <span class="pt-color-primary">Terms & Conditions</span> and <span class="pt-color-primary">Privacy Policy</span>
                        </label>

                        @error('privacy_policy')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 ">
                        <div class="d-flex justify-content-center pt-width-p-80 my-0 mx-auto">
                            <button type="submit" class="btn common-btn">
                                {{ __('Create Account') }}
                            </button>
                        </div>
                    </div>
                </form>

                <form method="POST"  id="frm-register-student" class="require-validation"
                data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                style="display: none;">
                    @csrf
                    <input type="hidden" name="role" id="student" value="Student"  >
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="col-form-label p-0 mb-1">{{ __('First Name') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="name" autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="col-form-label p-0 mb-1">{{ __('Last Name') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="name" autofocus>

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

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6" >
                            <label for="country_stud_id" class="col-form-label p-0 mb-1">{{ __('Country') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <div id="country_stud_div">
                                <select class="form-control country_id select2 @error('country_id') is-invalid @enderror" name="country_id" id="country_id" data-placeholder="Select Country">
                                    <option value=""> Select Country</option>
                                </select>
                            </div>

                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="col-form-label p-0 mb-1">{{ __('Password') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="password-confirm" class="col-form-label p-0 mb-1">{{ __('Confirm Password') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="off">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 subscription" >
                        <div class="d-flex wrapper justify-content-between">
                            @foreach(\App\Models\Subscription::where('status','Active')->get() as $sub)
                                <input type="hidden" id="stripe_product_id" name="stripe_product_id" value="{{ $sub->stripe_product_id }}">
                                <input type="hidden" id="price" name="price" value="{{ $sub->price }}">
                                <input type="hidden" id="minutes" name="minutes" value="{{$sub->minutes}}">
                                <input type="hidden" id="slots" name="slots" value="{{$sub->slots}}">

                                <input type="radio" id="option-Basic_{{$sub->id}}" name="subscription_id" value="{{$sub->id}}">
                                <label for="option-Basic_{{$sub->id}}" class="option">
                                    <div class="k-width-p-100">
                                        <div class="pt-font-size-px-16">{{$sub->plan}}</div>
                                        <div class="pt-font-size-px-16">${{$sub->price}}</div>
                                        <div class="pt-font-size-px-14">Minutes :{{$sub->minutes}}</div>
                                    </div>
                                </label>
                            @endforeach               
                        </div>
                    </div>

                    <div id="payment_method" >
                        <div class="row mb-3">
                            <div class="col-md-12 required">
                                <label class="col-form-label p-0 mb-1">Name on Card<span class="pt-color-red pt-fs-16">*</span></label> 

                                <input type="text" id="card_holder" name="card_holder"  class=
                                "form-control card-holder @error('card_holder') is-invalid @enderror"  size="4" value="demo">

                                @error('card_holder')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 card required">
                                <label class="col-form-label p-0 mb-1">Card Number <span class="pt-color-red pt-fs-16">*</span></label>  

                                <input type="text" id="card_number" name="card_number" class="form-control card-number @error('card_number') is-invalid @enderror"  size="20" autocomplete="off" value="4242 4242 4242 4242 ">

                                @error('card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 cvc required">
                                <label class="col-form-label p-0 mb-1">CVC <span class="pt-color-red pt-fs-16">*</span></label>

                                <input type="text" id="cvc" name="cvc"  class="form-control card-cvc @error('cvc') is-invalid @enderror" placeholder="ex. 311" size="4" autocomplete="off" value="1234">

                                @error('cvc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4 expiration required">
                                <label class="col-form-label p-0 mb-1">Expiration Month <span class="pt-color-red pt-fs-16">*</span></label> 

                                <input type="text" id="month" name="month" class="form-control card-expiry-month @error('month') is-invalid @enderror" placeholder="MM" size="2" value="12">

                                @error('month')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4 expiration required">
                                <label class="col-form-label p-0 mb-1">Expiration Year <span class="pt-color-red pt-fs-16">*</span></label> 

                                <input type="text" id="year" name="year" class="form-control card-expiry-year @error('year') is-invalid @enderror" placeholder="YYYY" size="4" value="2024">

                                @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                    </div> 

                        <!-- <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div> -->
  
                        <!-- <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div> -->
  
                        <!-- <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div> -->

                    <div class="form-check mb-3">
                        <input class="form-check-input @error('privacy_policy') is-invalid @enderror" type="checkbox" value="1" id="privacy_policy" name="privacy_policy" >
                        <label class="form-check-label" for="privacy_policy">
                            Accept <span class="pt-color-primary">Terms & Conditions</span> and <span class="pt-color-primary">Privacy Policy</span>
                        </label>
                        @error('privacy_policy')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-center pt-width-p-80 my-0 mx-auto">
                            <button class="btn common-btn" >
                                {{ __('Continue') }}
                            </button>
                        </div>
                    </div>

                </form>

                <div class="mb-3 d-flex justify-content-center">
                    <div class="pt-color-black">
                        Already have an account? <a class="p-0 text-decoration-none pt-color-primary" href="{{ route('login') }}">
                            {{ __('Sign in') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@push('js-hooks')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    $(function() {
        $("#frm-register-student").validate({
            rules: {
                first_name: {
                    required: true
                }, 
                last_name: {
                    required: true
                }, 
                email: {
                    required: true
                }, 
                country_id: {
                    required: true
                }, 
                password: {
                    required: true,
                    minlength:8
                },
                password_confirmation: {
                    required: true,
                    minlength:8
                },
                subscription_id: {
                    required: true
                },
                card_holder: {
                    required: true,
                    minlength:4,
                    maxlength:4
                },
                card_number: {
                    required: true,
                    minlength:20,
                    maxlength:20
                },
                cvc: {
                    required: true,
                    minlength:4,
                    maxlength:4
                },
                month: {
                    required: true,
                    minlength:2,
                    maxlength:2
                },
                year: {
                    required: true,
                    minlength:4,
                    maxlength:4
                },
            },
            messages: {
                first_name: {
                    required: "First Name is required"
                },
                last_name: {
                    required: "Last Name is required"
                },
                email: {
                    required: "Email is required"
                },
                country_id: {
                    required: "Country is required"
                },
                password: {
                    required: "New Password is required",
                    minlength:"New password must be 8 character"
                },
                password_confirmation: {
                    required: "Confirmed Password is required",
                    minlength:"Confirmed Password must be 8 character",
                    // equalTo :"Confirmd Password  and New Password not same."
                },
                subscription_id: {
                    required: "Subscription is required"
                },
                card_holder: {
                    required: "Name on Card is required",
                    minlength:"Name on Card must be 4 character",
                    // maxlength:"Name on card  no more than 4 characters.",
                },
                card_number: {
                    required: "Card Number is required",
                    minlength:"Card Number must be 20 character",
                    maxlength:"Card Number no more than 20 characters.",
                },
                cvc: {
                    required: "CVC is required",
                    minlength:"CVC must be 4 character",
                    maxlength:"CVC no more than 4 characters.",
                },
                month: {
                    required: "Month is required",
                    minlength:"Month must be 2 character",
                    maxlength:"Month no more than 2 characters.",
                },
                year: {
                    required: "Year is required",
                    minlength:"Year must be 4 character",
                    maxlength:"Year no more than 4 characters.",
                },
            },
            submitHandler: function(form) {
                var $form = $(".require-validation");
      
                $('form.require-validation').bind('submit', function(e) {
                    var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                                     'input[type=text]', 'input[type=file]',
                                     'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;
                    $errorMessage.addClass('hide');
              
                    $('.has-error').removeClass('has-error');
                    $inputs.each(function(i, el) {
                        var $input = $(el);
                        if ($input.val() === '') {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault();
                        }
                    });
               
                    if (!$form.data('cc-on-file')) {
                        e.preventDefault();
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                        }, stripeResponseHandler);
                    }
                });
          
                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text(response.error.message);
                    } else {
                        /* token contains id, last4, and card type */
                        var token = response['id'];
                           
                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }
            }
        });
       
    });
    $(document).ready(function() {
        $(".select2").select2({
            placeholder: $(this).data('placeholder'),
            allowClear: true
        });   

        $('input:radio[name=role]').change(function() {
            if (this.value == 'Tutor') {
                $("#frm-register-student").css("display","none");
                $("#frm-register-tutor").css("display","block");
                // $('.tutor_field').addClass('d-flex');
                // $('.subscription').addClass('d-none');
                // $('.tutor_field').removeClass('d-none');
                // $('.subscription').removeClass('d-flex');
            }
            if (this.value == 'Student') {
                $("#frm-register-student").css("display","block");
                $("#frm-register-tutor").css("display","none");
                // $('.tutor_field').addClass('d-none');
                // $('.subscription').css('display', 'block');
                // $('.tutor_field').removeClass('d-flex');
                // $('.subscription').removeClass('d-none');
            }
        });

        $.ajax({
            url:"{{url('get-country')}}",
            type: "POST", 
            data: {
                _token: '{{csrf_token()}}',
                input_name : "country_institution",
                placeholder_name : "Select Country of Institution" 
            },
            dataType : 'json',
            beforeSend: function(){
                $('#country_institution_div').html('Loading...');
            },
            success: function(result){
                // alert($("#country_id").attr('class'));
                $("#country_institution_div").html(result);
            }
        });

        $.ajax({
            url:"{{url('get-country')}}",
            type: "POST", 
            data: {
                _token: '{{csrf_token()}}', 
                input_name : "country_id",
                placeholder_name : "Select Country"
            },
            dataType : 'json',
            beforeSend: function(){
                $('#country_stud_div').html('Loading...');
            },
            success: function(result){
                $("#country_stud_div").html(result);
            }
        });
    });

    function getState(country_id){
        var countryid = country_id.value;

        $.ajax({
            url:"{{url('get-states')}}",
            type: "POST", 
            data: {
                country_id : countryid,
                _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            beforeSend: function(){
                $('#state_institution_div').html('Loading...');
            },
            success: function(result){
                // console.log(result);
                $("#state_institution_div").html(result);
            }
        });
    }

    function getCity(state_id){
        var stateid = state_id.value;
        
        $.ajax({
            url:"{{url('get-cities')}}",
            type: "POST", 
            data: {
                state_id : stateid,
                _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            beforeSend: function(){
                $('#city_institution_div').html('Loading...');
            },
            success: function(result){
                // console.log(result);
                $("#city_institution_div").html(result);
            }
        });
    }

   
</script>

@endpush