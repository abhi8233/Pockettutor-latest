@extends('layouts.adminApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-credit-card-outline" aria-hidden="true"></i>
            <span class="ps-1">Stripe Payment</span>
        </label>
    </div>
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
        @endif
    <div class="box-main bg-white p-3 px-4 mt-4 pb-5">
         <form id="stripe-setting"  >
            @method('POST')
            @csrf
        <div class="page-head  py-2 d-flex justify-content-between align-items-center mb-3">
            <label class="d-flex align-items-center">
                <span class="">Stripe Payment Form</span>
            </label>
            <div class="d-flex align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="option" data-on-toggle="Enable" data-off-toggle="Disable">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
               
                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Secret Key <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter secret key" class="form-control" id="setting_key" name="setting_key">

                            @error('setting_key')
                            <span class="" role="alert" style="font-color:red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="mb-5">
                        <label for="email" class="col-form-label p-0 mb-1">Public Key <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter public key" class="form-control" id="setting_value" name="setting_value">
                        @error('setting_value')
                            <span class="" role="alert" style="font-color:red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="save">
                        <button type="submit" class="btn text-decoration-none common-btn "  >
                            Save Settings
                        </button>
                    </div>
                
            </div>

            <div class="col-12 col-md-6">
            
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
@section('js-hooks')
<script type="text/javascript">
     $(document).ready(function() {
        $("#stripe-setting").validate({
            rules: {
                setting_key: {
                    required: true
                },
                setting_value: {
                    required: true
                },
            },
            messages: {
                admin_email: {
                    required: "Stripe secret key is required"
                },
                name: {
                    required: "Stripe public key is required"
                },
            },
            submitHandler: function(form) {
                // alert('valid form submitted'); 
                $.ajax({
                    type: "POST",
                    url: "{{ route('stripe_setting') }}",
                    data: new FormData($('#stripe-setting')[0]),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 200) {
                            $(".save").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Stripe Setting Added successfully.</div>');
                            setTimeout(function(){
                                window.location ="{{ route('admin_settings') }}";
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