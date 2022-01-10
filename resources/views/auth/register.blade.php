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
                            <label for="password" class="col-form-label p-0 mb-1">{{ __('Password') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

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


                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>

                        <div class="col-md-6">
                            <label for="language_id" class="col-form-label p-0 mb-1">{{ __('Language') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control language_id" name="language_id">
                                <option value=""> Select Language</option>
                                @foreach(\App\Models\Languages::all() as $language)
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                           
                        </div>
                    </div>

                    <div class="row mb-3 tutor_field">
                        <div class="col-md-6">
                            <label for="specialization" class="col-form-label p-0 mb-1">{{ __('
                                Specialization') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control specialization" name="specialization">
                                <option value=""> Select Specialization</option>
                                @foreach(\App\Models\Specialization::All() as $specialization)
                                <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                @endforeach
                                
                            </select>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="country_id" class="col-form-label p-0 mb-1">{{ __('Country') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control country_id" name="country_id" id="country_id">
                                <option value=""> Select Country</option>
                                @foreach(\App\Models\Country::all() as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>

                    <div class="row mb-3 tutor_field">

                        <div class="col-md-6">
                            <label for="state_id" class="col-form-label p-0 mb-1">{{ __('State') }} <span class="pt-color-red pt-fs-16">*</span></label>


                            <select class="form-control state_id" name="state_id" id="state_id">
                                <option value=""> Select State</option>

                            </select>
                            
                        </div>
                    </div>

                    
                        <div class="mb-3 subscription" style="display: none;">
                        <div class="d-flex wrapper justify-content-between">
                             @foreach(\App\Models\Subscription::All() as $sub)
                             <input type="radio" id="option-Basic" name="subscription_id" value="{{$sub->id}}">
                            <label for="option-Basic" class="option">
                                <div class="k-width-p-100">
                                    <div class="pt-font-size-px-16">{{$sub->plan}}</div>
                                    <div class="pt-font-size-px-16">${{$sub->price}}</div>
                                    <div class="pt-font-size-px-14">Minutes :{{$sub->minutes}}</div>
                                </div>
                            </label>
                             @endforeach               
                                

                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
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
<script>
$(document).ready(function() {
    $('#country_id').change(function() {
    var country_id = this.value;
    $('#state_id').html('');
    $.ajax({
        url:"{{url('get-states')}}",
        type: "POST", 
        data: {
        country_id: country_id,
        _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
        $('#state_id').html('<option value="">Select State</option>');
        $.each(result.states,function(key,value){
        $("#state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
        });
        }
    });
    });
});
</script>

@endpush