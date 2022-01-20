@extends('layouts.adminApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-email-outline" aria-hidden="true"></i>
            <span class="ps-1">Tutor Edit</span>
        </label>
    </div>
    <div class="box-main bg-white p-3 px-4 mt-4 pb-2">
        <div class="row">
            <form id="frm-UpdateTutor" name="frm-UpdateTutor" class="UpdateTutorFrm" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
                <input type="hidden" id="user_id" name="id" value="{{$user->id}}">
                <input type="hidden" name="role" id="tutor" value="Tutor">
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="col-form-label p-0 mb-1">{{ __('First Name') }} <span class="pt-color-red pt-fs-16">*</span></label>

                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" autocomplete="name" autofocus>

                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="last_name" class="col-form-label p-0 mb-1">{{ __('Last Name') }} <span class="pt-color-red pt-fs-16">*</span></label>

                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" autocomplete="name" autofocus>

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

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">

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
                        <label for="institution" class="col-form-label p-0 mb-1">{{ __('Institution') }} <span class="pt-color-red pt-fs-16">*</span></label>

                        <input type="text" class="form-control institution  @error('institution') is-invalid @enderror" name="institution" id="institution" value="{{ $user->institution }}">
                        
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
                        <label for="specialization" class="col-form-label p-0 mb-1">{{ __('Specialization') }} <span class="pt-color-red pt-fs-16">*</span></label>
                        
                        <select class="form-control specialization select2" id="specialization" name="specialization">
                            <option value=""> Select Specialization</option>

                            @foreach( \App\Models\Specialization::All() as $specialization)
                                <option value="{{$specialization->id}}"  {{ $specialization->id == $user->specialization_id ? 'selected' :'' }} >
                                    {{ $specialization->name }}
                                </option>
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

                        <select class="form-control language_id select2" id="language_id" name="language_id">
                            <option value=""> Select Language</option>
                            @foreach(\App\Models\Languages::all() as $language)
                                <option value="{{$language->id}}" {{$language->id == $user->language_id ?'selected':''}}>{{$language->name}}</option>
                            @endforeach
                        </select>
                       
                        @error('language_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-2">
                    <div class="d-flex justify-content-center pt-width-p-80 my-0 mx-auto">
                        <button type="submit" class="btn common-btn">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>

                <div class="msg"></div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js-hooks')
<script>
    $(document).ready(function() {
        $(".select2").select2({
            placeholder: $(this).data('placeholder'),
            allowClear: true
        });

        //Country dropdown
        $.ajax({
            url:"{{url('get-country')}}",
            type: "POST", 
            data: {
                _token: '{{csrf_token()}}', 
                input_name : "country_id",
                placeholder_name : "Select Country",
                current_country_id : '{{ $user->country_id}}'
            },
            dataType : 'json',
            beforeSend: function(){
                $('#country_stud_div').html('Loading...');
            },
            success: function(result){
                $("#country_stud_div").html(result);
            }
        });

        //Institution country dropdown
        $.ajax({
            url:"{{url('get-country')}}",
            type: "POST", 
            data: {
                _token: '{{csrf_token()}}',
                input_name : "country_institution",
                placeholder_name : "Select Country of Institution",
                current_country_id : '{{ $user->country_institution }}',
            },
            dataType : 'json',
            beforeSend: function(){
                $('#country_institution_div').html('Loading...');
            },
            success: function(result){
                // console.log(result);
                $("#country_institution_div").html(result);
            }
        });

        //Institution state dropdown
        $.ajax({
            url:"{{url('get-states')}}",
            type: "POST", 
            data: {
                country_id : '{{ $user->country_institution }}',
                current_state_id : '{{ $user->state_institution }}',
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

        //Institution city dropdown
        $.ajax({
            url:"{{url('get-cities')}}",
            type: "POST", 
            data: {
                current_city_id : '{{ $user->city_institution }}',
                state_id : '{{ $user->state_institution }}',
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

        //Update tutor details
        $("#frm-UpdateTutor").validate({
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
                specialization : {
                    required: true
                },
                language_id : {
                    required: true
                },
                institution : {
                    required: true
                },
                country_institution : {
                    required: true
                },
                state_institution : {
                    required: true
                },
                city_institution : {
                    required: true
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
                    required: "Country id is required"
                },
                specialization : {
                    required: "Specialization is required"
                },
                language_id : {
                    required: "Language id is required"
                },
                institution : {
                    required: "Language id is required"
                },
                country_institution : {
                    required: "Country of institution is required"
                },
                state_institution : {
                    required: "State of institution is required"
                },
                city_institution : {
                    required: "City of institution is required"
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('tutor.update',$user->id) }}",
                    data: new FormData($('#frm-UpdateTutor')[0]),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        // console.log(data);
                        // alert(data.status);
                        if (data.status == 200) {
                            $(".msg").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Tutor Update Successfullay.</div>');
                            setTimeout(function(){
                                window.location ="{{ route('tutor.index') }}";
                            },1000);
                        }else {
                            // alert("Opps..! Something Went to Wrong.")
                            $(".msg").after('<div class="alert alert-danger alert-dismissible" id="myAlert"><strong>Opps..!</strong> Something Went to Wrong.</div>');
                        }
                    }
                });
                return false;
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
@endsection