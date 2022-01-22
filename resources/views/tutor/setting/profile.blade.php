@extends('layouts.tutorApp')

@section('content')
<div class="student-list-page main-top">

    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Profile</span>
        </label>
    </div>

    <div class="row no-gutters mt-4 profile-main">

        <div class="col-12 col-md-3">
            <div class="box-main bg-white p-3 pt-height-p-100 profile-tabs pe-0 ps-0">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
                            <span>Profile</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="mdi mdi-account-edit-outline" aria-hidden="true"></i>
                            <span>Edit Profile</span>
                        </button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="google-meet-tab" data-bs-toggle="tab" data-bs-target="#google-meet" type="button" role="tab" aria-controls="google-meet" aria-selected="false">
                            <i class="mdi mdi-account-edit-outline" aria-hidden="true"></i>
                            <span>Google Meet</span>
                        </button>
                    </li> -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                            <i class="mdi mdi-lock-outline" aria-hidden="true"></i>
                            <span>Change Password</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-9">
            <div class="box-main bg-white p-3 ">
                <div class="tab-content profile-contents" id="myTabContent">

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="pt-font-size-px-18">View Profile</div>

                                <div class="mt-5 d-flex flex-column align-items-center">
                                     @if(isset($user->profile))
                                        <img src="../assets/images/profile/{{$user->profile}}" class="pt-width-px-150 pt-height-px-150">
                                        @else
                                        <img src="../assets/images/profile.png" class="pt-width-px-150 pt-height-px-150">
                                        @endif
                                    <span class="mt-2 fw-500 pt-font-size-px-18">{{$user->first_name}} {{$user->last_name}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-width-p-80 pb-5" style="margin: 0 auto">
                            <div class="col-12 col-md-6">
                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Email id</span>
                                    <span class="fw-500">{{$user->email}}</span>
                                </div>

                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Country</span>
                                    <span class="fw-500">{{ isset($user->country_id) ? $user->country_id :  '-' }}</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Language </span>
                                    <span class="fw-500">{{ isset($user->languages->name) ? $user->languages->name :  '-' }} </span>
                                </div>

                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Specialization</span>
                                    <span class="fw-500">{{ isset($user->specialization->name) ? $user->specialization->name :  '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form  id="update-profile" class="pt-width-p-80 my-0 mx-auto">
                            @method('POST')
                            @csrf
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="pt-font-size-px-18">Edit Profile</div>
                                    <div class="mt-5 d-flex flex-column align-items-center">
                                        <div class="profile-img tutor">
                                            @if(isset($user->profile))
                                                <img src="../assets/images/profile/{{$user->profile}}" id="preview_img" class="pt-width-px-150 pt-height-px-150">
                                            @else
                                                <img src="../assets/images/profile.png" id="preview_img" class="pt-width-px-150 pt-height-px-150">
                                            @endif
                                            <i class="mdi mdi-pencil edit" id="OpenImgUpload" aria-hidden="true"></i>
                                            
                                            <input type="file" id="imgupload" name="profile" accept="image/*" onchange="loadPreview(this);" style="display: none;"/>
                                        </div>
                                        <span class="mt-2 fw-500 pt-font-size-px-18">{{$user->first_name}} {{$user->last_name}}</span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{$user->id}}">

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">First Name <span class="pt-color-red pt-fs-16">*</span></label>

                                        <input type="text" placeholder="Enter plan name" class="form-control" name="first_name" value="{{$user->first_name}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Last Name <span class="pt-color-red pt-fs-16">*</span> </label>

                                        <input type="text" placeholder="Enter minutes" class="form-control" name="last_name" value="{{$user->last_name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Country <span class="pt-color-red pt-fs-16">*</span></label>

                                        <select class="select2 country select2-hidden-accessible" name="country_id" id="country_id"></select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Specialization <span class="pt-color-red pt-fs-16">*</span></label>

                                        <select class="select2 intrest select2-hidden-accessible" name="specialization_id">
                                            @foreach(\App\Models\Specialization::All() as $specialization)
                                                <option value="{{$specialization->id}}" {{$specialization->id == $user->specialization_id ?'selected':''}}>{{$specialization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Language <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <select class="language" name="language_id">
                                           @foreach(\App\Models\Languages::all() as $language)
                                                <option value="{{$language->id}}" {{$language->id == $user->language_id ?'selected':''}}>{{$language->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Email<span class="pt-color-red pt-fs-16">*</span> </label>

                                        <input type="text" placeholder="Enter email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>

                            @foreach($user->document as $data)
                                
                                @if($data['document_key'] == "passport" && $passport = $data['document_value'])
                                    
                                @endif

                                @if($data['document_key'] == "certificate" && $certificate = $data['document_value'])
                                    
                                @endif

                                @if($data['document_key'] == "other_document" && $other_document = $data['document_value'])
                                    
                                @endif
                                
                            @endforeach

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Passport <span class="pt-color-red pt-fs-16">*</span> </label>

                                        <img src="" id="passport_preview" class="pt-width-px-150 pt-height-px-150" style="display:none;">
                                     
                                        <div class="file-upload-wrapper" data-text="Select your file!">
                                            <input name="passport" type="file" class="file-upload-field" onchange="loadPassportPreview (this);">
                                        </div>
                                        @if(isset($passport))
                                            <img src="{{ asset('assets/images/document') }}{{ '/'.$passport }}" style="width: 50px;height: 50px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Certificate <span class="pt-color-red pt-fs-16">*</span></label>

                                        <div class="file-upload-wrapper" data-text="Select your file!">
                                            <input name="certificate" type="file" class="file-upload-field">
                                        </div>
                                        @if(isset($certificate))
                                            <img src="{{ asset('assets/images/document') }}{{ '/'.$certificate }}" style="width: 50px;height: 50px;">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Other Documents <span class="pt-color-red pt-fs-16">*</span></label>

                                        <div class="file-upload-wrapper" data-text="Select your file!">
                                            <input name="other_document" type="file" class="file-upload-field">
                                        </div>
                                        @if(isset($other_document))
                                            <img src="{{ asset('assets/images/document') }}{{ '/'.$other_document }}" style="width: 50px;height: 50px;">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <button type="submit"class="btn text-decoration-none common-btn pt-width-p-40" >
                                    Profile Update
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- <div class="tab-pane fade" id="google-meet" role="tabpanel" aria-labelledby="google-meet-tab">
                        
                       <div id="div-google-meet"></div>

                    </div> -->

                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="pt-font-size-px-18">Change Password</div>
                            </div>
                        </div>
                        <form  class=""  id="change-password">
                            @method('POST')
                            @csrf
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">New Password <span class="pt-color-red pt-fs-16">*</span> </label>

                                        <div class="position-relative">
                                            <input type="password" class="form-control" id="new_password" name="new_password" >
                                            <span toggle="#new_password" class="mdi mdi-eye-outline field-icon toggle-password"></span>
                                        </div>

                                        @error('new_password'))
                                        <div class="pt-color-red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="col-form-label p-0 mb-1">Confirm Password <span class="pt-color-red pt-fs-16">*</span></label>

                                        <div class="position-relative">
                                            <input  type="password" class="form-control" name="confirmed" id="confirmed">
                                            <span toggle="#confirmed" class="mdi mdi-eye-outline field-icon toggle-password"></span>
                                        </div>

                                        @error('confirmed'))
                                        <div class="pt-color-red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="change mb-4">
                                        <button type="submit" class="btn text-decoration-none common-btn" data-bs-toggle="modal" data-bs-target="#newplan"> Change Password </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
@section('js-hooks')
<script>
    $('#OpenImgUpload').click(function(){ 
        $('#imgupload').trigger('click'); 
    });

    $(document).ready(function() {

        $.ajax({
            url:"{{url('get-country')}}",
            type: "POST", 
            data: {
                _token: '{{csrf_token()}}',
                current_country_id:'{{ $user->country_id }}'
            },
            dataType : 'json',
            beforeSend: function(){
                $('#country_id').html('Loading...');
            },
            success: function(result){
                // console.log(result);
                $("#country_id").html(result);
            }
        });

        $("#change-password").validate({
            rules: {
                new_password: {
                    required: true,
                    minlength:8
                },
                confirmed: {
                    required: true,
                    minlength:8,
                    equalTo : "#new_password"
                }
            },
            messages: {
                new_password: {
                    required: "New Password is required",
                    minlength:"New password must be 8 character"
                },
                confirmed: {
                    required: "Confirmed Password is required",
                    minlength:"Confirmed Password must be 8 character",
                    equalTo :"Confirmd Password  and New Password not same."
                },
            },
            submitHandler: function(form) {
                // alert('valid form submitted'); 
                $.ajax({
                    type: "POST",
                    url: "{{route('updateTPassword')}}",
                    data: new FormData($('#change-password')[0]),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 200) {
                            $(".change").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Password Change  successfully.</div>');
                            setTimeout(function(){
                                window.location ="{{ route('tprofile') }}";
                            },1000);
                        } else {
                            alert("Opps..! Something Went to Wrong.")
                        }
                    }
                });
                return false;
            }
        });
    });
</script>

<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(200).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function loadPassportPreview(input, id) {
        id = id || '#passport_preview';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(200).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {
       $("#update-profile").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                first_name: {
                    required: "Tutor First Name  is required"
                },
                last_name: {
                    required: "Tutor Last name is required"
                },
                email: {
                    required: "Tutor email is required"
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('updateTProfile') }}",
                    data: new FormData($('#update-profile')[0]),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 200) {
                            $(".update").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Student Profile Update  successfully.</div>');
                            setTimeout(function(){
                                window.location ="{{ route('tprofile') }}";
                            },1000);
                        } else {
                            alert("Opps..! Something Went to Wrong.")
                        }
                    }
                });
                return false;
            }
        }); 
    });

</script>
@endsection