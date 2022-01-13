@extends('layouts.adminApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Profile</span>
        </label>
        <!-- <div class="date-filter">
            <input type="text" class="form-control" id="stu_list_daterange" />
        </div> -->
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
                                    <!-- <img src="../assets/images/profile.png" class="pt-width-px-150 pt-height-px-150"> -->
                                    <span class="mt-2 fw-500 pt-font-size-px-18">{{$user->first_name}} {{$user->last_name}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-width-p-80 pb-5" style="margin: 0 auto">
                            <div class="col-12 col-md-6">
                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">First Name</span>
                                    <span class="fw-500">{{$user->first_name}}</span>
                                </div>

                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Email id</span>
                                    <span class="fw-500">{{$user->email}}</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Last Name</span>
                                    <span class="fw-500">{{$user->last_name}}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form method="" action="" id="update-profile" class="pt-width-p-80 my-0 mx-auto">
                        @method('POST')
                            @csrf
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="pt-font-size-px-18">Edit Profile</div>

                                    <div class="mt-5 d-flex flex-column align-items-center">
                                        <div class="profile-img student">
                                        @if(isset($user->profile))
                                        <img src="../assets/images/profile/{{$user->profile}}" id="preview_img" class="pt-width-px-150 pt-height-px-150">
                                        @else
                                        <img src="../assets/images/profile.png" id="preview_img" class="pt-width-px-150 pt-height-px-150">
                                        @endif
                                            <i class="mdi mdi-pencil-circle  edit" id="OpenImgUpload" aria-hidden="true"></i>
                                            <input type="file" id="imgupload" name="profile" accept="image/*" onchange="loadPreview(this);" style="display: none;"/>
                                        </div>

                                        <span class="mt-2 fw-500 pt-font-size-px-18">{{$user->first_name}} {{$user->last_name}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">First Name <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
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

                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">First Name <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <input type="text" placeholder="Enter plan name" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>

                            </div>
                            <div class="row d-flex justify-content-center">
                                <button type="submit" class="btn text-decoration-none common-btn pt-width-p-40 update" >
                                    Profile Update
                                </button>
                            </div>
                        </form>
                    </div>
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
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <input type="password" class="form-control" id="new_password" name="new_password" >
                                            <span toggle="#new_password" class="mdi mdi-eye-outline field-icon toggle-password"></span>
                                        </div>
                                        @error('new_password'))
                                        <div class="pt-color-red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="col-form-label p-0 mb-1">Confirm Password <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <div class="position-relative">
                                            <input  type="password" class="form-control" name="confirmed" id="confirmed">
                                            <span toggle="#confirmed" class="mdi mdi-eye-outline field-icon toggle-password"></span>
                                        </div>
                                        @error('confirmed'))
                                        <div class="pt-color-red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="change mb-4">
                                        <button type="submit" class="btn text-decoration-none common-btn" data-bs-toggle="modal" data-bs-target="#newplan">
                                            Change Password
                                        </button>
                                    </div>

                                </div>

                                <div class="col-12 col-md-6">



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
<script type="text/javascript">
$('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
 function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
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
                    url: "{{route('updateSAPassword')}}",
                    data: new FormData($('#change-password')[0]),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 200) {
                            $(".change").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Password Change  successfully.</div>');
                            setTimeout(function(){
                                window.location ="{{ route('SAprofile') }}";
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
                    required: "Super Admin First Name  is required"
                },
                last_name: {
                    required: "Super Admin Last name is required"
                },
                email: {
                    required: "Super Admin email is required"
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('updateSAProfile') }}",
                    data: new FormData($('#update-profile')[0]),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 200) {
                            $(".update").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Super Admin Profile Update  successfully.</div>');
                            setTimeout(function(){
                                window.location ="{{ route('SAprofile') }}";
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