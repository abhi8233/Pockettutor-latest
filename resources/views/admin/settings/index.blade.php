@extends('layouts.adminApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-credit-card-outline" aria-hidden="true"></i>
            <span class="ps-1">Stripe Payment</span>
        </label>
    </div>
    <div class="box-main bg-white p-3 px-4 mt-4 pb-5">
         <form  method="post" action="{{ route('stripe_setting') }}" >
            @csrf
        <div class="page-head  py-2 d-flex justify-content-between align-items-center mb-3">
            <label class="d-flex align-items-center">
                <span class="">Stripe Payment Form</span>
            </label>
            <div class="d-flex align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="status" data-on-toggle="Active" data-off-toggle="Inactive">
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

                    <div>
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