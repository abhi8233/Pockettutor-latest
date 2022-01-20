@extends('layouts.adminApp')
@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-email-outline" aria-hidden="true"></i>
            <span class="ps-1">Student Edit</span>
        </label>
    </div>
    <div class="box-main bg-white p-3 px-4 mt-4 pb-2">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <form method="POST" action="{{ route('student.update',$user->id) }}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="user_id" name="id" value="{{$user->id}}">
                    <input type="hidden" name="role" id="student" value="Student"  >

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
                            <label for="country_id" class="col-form-label p-0 mb-1">{{ __('Country') }}<span class="pt-color-red pt-fs-16">*</span></label>

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

                    <div class="mb-3">
                        <div class="d-flex justify-content-center pt-width-p-80 my-0 mx-auto">
                            <button type="submit" class="btn common-btn">
                                {{ __('Edit Account') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6"></div>
        </div>
    </div>
</div>
@endsection
@section('js-hooks')
<script>
    $(document).ready(function() {
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
    });
</script>


@endsection