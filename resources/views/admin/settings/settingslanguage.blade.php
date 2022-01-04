@extends('layouts.adminApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-translate" aria-hidden="true"></i>
            <span class="ps-1">Multi Language</span>
        </label>
    </div>
    <div class="box-main bg-white p-3 px-4 mt-4 pb-5">

        <div class="row">
            <div class="col-12 col-md-9">
                <form method="" action="" class="">

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label">All language <span class="pt-color-red pt-fs-16">*</span> </label>
                        <div class="col-md-7 p-0">
                            <select class="select2 select2-hidden-accessible" name="state">
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div class="col-md-1 d-flex justify-content-center align-items-center">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label">Thank you for the Registration</label>
                        <div class="col-md-7 p-0">
                            <input type="text" placeholder="Gracias por el registro" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-5">
                        <label for="email" class="col-md-4 col-form-label">Thank you for the Registration</label>
                        <div class="col-md-7 p-0">
                            <input type="text" placeholder="Gracias por el registro" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn text-decoration-none common-btn " data-bs-toggle="modal" data-bs-target="#newplan">
                                Save Settings
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-12 col-md-3">
                
            </div>
        </div>
    </div>
</div>
@endsection