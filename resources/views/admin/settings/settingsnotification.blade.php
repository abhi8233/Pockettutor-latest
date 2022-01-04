@extends('layouts.adminApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-email-outline" aria-hidden="true"></i>
            <span class="ps-1">Email Notification</span>
        </label>
    </div>
    <div class="box-main bg-white p-3 px-4 mt-4 pb-5">
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
                <form method="" action="" class="">

                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Super Admin Email Id <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter super admin email id " class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Sender Name <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter sender name" class="form-control" name="plan-name">
                    </div>

                    <div class="mb-5">
                        <label for="email" class="col-form-label p-0 mb-1">Sender Email Id <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter sender email id" class="form-control" name="plan-name">
                    </div>

                    <div>
                        <button class="btn text-decoration-none common-btn " data-bs-toggle="modal" data-bs-target="#newplan">
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