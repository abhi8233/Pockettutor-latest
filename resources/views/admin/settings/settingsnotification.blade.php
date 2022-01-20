@extends('layouts.adminApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-email-outline" aria-hidden="true"></i>
            <span class="ps-1">Email Notification</span>
        </label>
    </div>
    <div class="box-main bg-white p-3 px-4 mt-4 pb-2">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
             </div>
        @endif
        <!-- <div class="page-head  py-2 d-flex justify-content-between align-items-center mb-3">
            <label class="d-flex align-items-center">
                <span class="">Stripe Payment Form</span>
            </label>
            <div class="d-flex align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-12 col-md-6">
                <form  id="frm-SettingNotification">
                    @method('POST')
                @csrf
                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Super Admin Email Id <span class="pt-color-red pt-fs-16">*</span> </label>

                        <input type="hidden" id="admin_email_id" name="admin_email_id" value="{{ isset($admin_email->id) ? $admin_email->id : '' }}">
                        <input type="text" placeholder="Enter super admin email id " class="form-control" id="admin_email" name="admin_email" value="{{ isset($admin_email->setting_value) ? $admin_email->setting_value : '' }}">

                        @error('admin_email'))
                            <div class="pt-color-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Sender Name <span class="pt-color-red pt-fs-16">*</span> </label>

                        <input type="hidden" id="sender_name_id" name="sender_name_id" value="{{ isset($sender_name->id) ? $sender_name->id : '' }}">
                        <input type="text" placeholder="Enter sender name" class="form-control" id="sender_name" name="sender_name" value="{{ isset($sender_name->setting_value) ? $sender_name->setting_value : '' }}">

                        @error('name')
                            <div class="pt-color-red"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="email" class="col-form-label p-0 mb-1">Sender Email Id <span class="pt-color-red pt-fs-16">*</span> </label>

                        <input type="hidden" id="sender_email_id" name="sender_email_id" value="{{ isset($sender_email->id) ? $sender_email->id : '' }}">
                        <input type="text" placeholder="Enter sender email id" id="sender_email" class="form-control" name="sender_email" value="{{ isset($sender_email->setting_value) ? $sender_email->setting_value : '' }}">

                        @error('email')
                            <div class="pt-color-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="save">
                        <button class="btn text-decoration-none common-btn " type="submit">
                            Save Settings
                        </button>
                    </div>

                </form>
            </div>
            <div class="col-12 col-md-6">
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-hooks')
<script type="text/javascript">
     $(document).ready(function() {
        $("#frm-SettingNotification").validate({
            rules: {
                admin_email: {
                    required: true
                },
                name: {
                    required: true
                },
                email: {
                    required: true
                },
            },
            messages: {
                admin_email: {
                    required: "Super Admin Email is required"
                },
                name: {
                    required: "Sender name is required"
                },
                email: {
                    required: "Sender email is required"
                },
            },
            submitHandler: function(form) {
                // alert('valid form submitted'); 
                $.ajax({
                    type: "POST",
                    url: "{{ route('setSettings.email.notification') }}",
                    data: new FormData($('#frm-SettingNotification')[0]),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 200) {
                            $(".save").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Settings Notification Added successfully.</div>');
                            setTimeout(function(){
                                window.location ="{{ route('getSettings.email.notification') }}";
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