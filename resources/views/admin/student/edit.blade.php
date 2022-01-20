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
                <form method="POST" id="frm-UpdateStudent" name="frm-UpdateStudent">
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
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>

                    <div class="msg"></div>
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

        //Update tutor details
        $("#frm-UpdateStudent").validate({
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
                }
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
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('student.update',$user->id) }}",
                    data: new FormData($('#frm-UpdateStudent')[0]),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        // console.log(data);
                        // alert(data.status);
                        if (data.status == 200) {
                            $(".msg").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Student Update Successfully.</div>');
                            setTimeout(function(){
                                window.location ="{{ route('student.index') }}";
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
</script>


@endsection