@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">

                <div class="fs-4 fw-bold mb-3">{{ __('Register') }}</div>

                <form method="POST" action="{{ route('register') }}" id="frm-register">
                    @csrf
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

                            <select class="form-control country_id select2 @error('country_id') is-invalid @enderror" name="country_id" id="country_id" data-placeholder="Select Country">
                                <option value=""> Select Country</option>
                                @foreach(\App\Models\Country::all() as $country)
                                    <option value="{{$country->id}}" {{ $country->id == old('country_id') ? 'selected' :'' }}>{{$country->name}}</option>
                                @endforeach
                            </select>

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

                    <div class="row mb-3 tutor_field">
                        <div class="col-md-6">
                            <label for="institution" class="col-form-label p-0 mb-1">{{ __('Institution') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control institution select2 @error('institution') is-invalid @enderror" name="institution" id="institution" data-placeholder="Select Institution">
                                <option value=""> Select Institution</option>
                                <option value="1" {{ 1 == old('institution') ? 'selected' :'' }} >Institution1</option>
                                <option value="2" {{ 2 == old('institution') ? 'selected' :'' }} >Institution2</option>
                            </select>

                            @error('institution')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="city_institution" class="col-form-label p-0 mb-1">{{ __('City of Institution') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control city_institution select2 @error('city_institution') is-invalid @enderror" name="city_institution" id="city_institution" data-placeholder="Select City of Institution">
                                <option value=""> Select City of Institution</option>
                                <option value="1" {{ 1 == old('city_institution') ? 'selected' :'' }}>City1</option>
                                <option value="2" {{ 2 == old('city_institution') ? 'selected' :'' }}>City2</option>
                            </select>

                            @error('city_institution')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="row mb-3 tutor_field">
                        <div class="col-md-6">
                            <label for="password" class="col-form-label p-0 mb-1">{{ __('Country of Institution') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control country_institution select2 @error('country_institution') is-invalid @enderror" name="country_institution" id="country_institution" data-placeholder="Select Country of Institution">
                                <option value=""> Select Country of Institution</option>
                                <option value="1" {{ 1 == old('country_institution') ? 'selected' :'' }}>Country1</option>
                                <option value="2" {{ 2 == old('country_institution') ? 'selected' :'' }}>Country2</option>
                            </select>

                            @error('country_institution')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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
                        
                    </div>

                    <div class="row mb-3 tutor_field">
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



                   <!--  <div class="row mb-3 tutor_field">

                        <div class="col-md-6">
                            <label for="state_id" class="col-form-label p-0 mb-1">{{ __('State') }} <span class="pt-color-red pt-fs-16">*</span></label>


                            <select class="form-control state_id" name="state_id" id="state_id">
                                <option value=""> Select State</option>

                            </select>
                            
                        </div>
                    </div> -->

                    
                    <div class="mb-3 subscription" style="display: none;">
                        <div class="d-flex wrapper justify-content-between">
                             @foreach(\App\Models\Subscription::where('status','Active')->get() as $sub)
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
        $(".select2").select2({
            placeholder: $(this).data('placeholder'),
            allowClear: true
        });   

        // if($('input:radio[name=role]').not(':checked')){
        //     $('#tutor').attr('checked',true);
        // }
        // setTimeout(function(){
        //     if ($('input:radio[name=role]').is(":checked") &&  $('input:radio[name=role]').val() == 'Tutor') {
               
        //         $('.tutor_field').addClass('d-flex');
        //         $('.subscription').addClass('d-none');
        //         $('.tutor_field').removeClass('d-none');
        //         // $('.subscription').removeClass('d-flex');
        //     }
        //     if ($('input:radio[name=role]').is(":checked") &&  $('input:radio[name=role]').val() == 'Student') {

        //         $('.tutor_field').addClass('d-none');
        //         $('.subscription').css('display', 'block');
        //         $('.tutor_field').removeClass('d-flex');
        //         $('.subscription').removeClass('d-none');
        //     }
        // },1000);
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
    
        // $('#country_id').change(function() {
        //     var country_id = this.value;
        //     $('#state_id').html('');
        //     $.ajax({
        //             url:"{{url('get-states')}}",
        //             type: "POST", 
        //             data: {
        //             country_id: country_id,
        //             _token: '{{csrf_token()}}' 
        //         },
        //         dataType : 'json',
        //         success: function(result){
        //             $('#state_id').html('<option value="">Select State</option>');
        //             $.each(result.states,function(key,value){
        //                 $("#state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
        //             });
        //         }
        //     });
        // });
});
</script>

@endpush