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
                <form  method="post" action="{{ route('add_notification') }}" >
            @csrf
                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Super Admin Email Id <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter super admin email id " class="form-control" id="admin_email" name="admin_email" value="{{auth()->user()->email}}">
                        @error('admin_email'))
                            <div class="pt-color-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Sender Name <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter sender name" class="form-control" id="name" name="name">
                        @error('name')
                            <div class="pt-color-red"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="email" class="col-form-label p-0 mb-1">Sender Email Id <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter sender email id" id="email" class="form-control" name="email">
                        @error('email')
                            <div class="pt-color-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
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