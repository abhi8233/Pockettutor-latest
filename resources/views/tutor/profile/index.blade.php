@extends('layouts.tutorApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-multiple-outline" aria-hidden="true"></i>
            <span class="ps-1">Profile</span>
        </label>
        <!-- <div class="date-filter">
            <input type="text" class="form-control" id="stu_list_daterange" />
        </div> -->
    </div>

    <div class="row no-gutters mt-4 profile-main">
        <div class="col-12 col-md-3">
            <div class="box-main bg-white p-3 pt-height-p-100 profile-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                            <i class="mdi mdi-view-dashboard-outline" aria-hidden="true"></i>
                            <span>Profile</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="mdi mdi-account-group-outline" aria-hidden="true"></i>
                            <span>Edit Profile</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                            <i class="mdi mdi-account-group-outline" aria-hidden="true"></i>
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
                                <div>View Profile</div>

                                <div class="mt-5 d-flex flex-column align-items-center">
                                    <img src="../assets/images/profile.png" class="pt-width-px-150 pt-height-px-150">
                                    <span class="mt-2 fw-500">John Marteen</span>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-width-p-80 pb-5" style="margin: 0 auto">
                            <div class="col-12 col-md-6">
                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Email id</span>
                                    <span class="fw-500">johnmarteen@gmail.com</span>
                                </div>

                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Country</span>
                                    <span class="fw-500">USA</span>
                                </div>

                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">State</span>
                                    <span class="fw-500">Texas</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Language</span>
                                    <span class="fw-500">English</span>
                                </div>

                                <div class="d-flex flex-column mb-2">
                                    <span class="fw-200">Field of interest</span>
                                    <span class="fw-500">Accounts maths tax</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <div class="row mb-4">
                            <div class="col-12">
                                <div>Edit Profile</div>

                                <div class="mt-5 d-flex flex-column align-items-center">
                                    <img src="../assets/images/profile.png" class="pt-width-px-150 pt-height-px-150">
                                    <span class="mt-2 fw-500">John Marteen</span>
                                </div>
                            </div>
                        </div>



                        <form method="" action="" class="pt-width-p-80 my-0 mx-auto">
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">First Name <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <input type="text" placeholder="Enter plan name" class="form-control" name="plan-name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Country <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <select class="select2 select2-hidden-accessible" name="country">
                                            <option value="IND">India</option>
                                            <option value="IND">India</option>
                                            <option value="IND">India</option>
                                            <option value="IND">India</option>
                                            <option value="IND">India</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Language <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <select class="select2 select2-hidden-accessible" name="language">
                                            <option value="IND">English</option>
                                            <option value="IND">Spanish</option>
                                            <option value="IND">French</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Passport <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <input type="text" placeholder="Enter monthly cost" class="form-control" name="plan-name">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">

                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Last Name <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <input type="text" placeholder="Enter minutes" class="form-control" name="plan-name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Field of interest <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <select class="select2 select2-hidden-accessible" name="intrest">
                                            <option value="IND">1</option>
                                            <option value="IND">2</option>
                                            <option value="IND">3</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Hourly Cost <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <input type="text" placeholder="Enter minutes" class="form-control" name="plan-name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="col-form-label p-0 mb-1">Passport Number <span class="pt-color-red pt-fs-16">*</span> </label>
                                        <input type="text" placeholder="Enter minutes" class="form-control" name="plan-name">
                                    </div>

                                </div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <button class="btn p-0 text-decoration-none common-btn pt-width-p-40" data-bs-toggle="modal" data-bs-target="#newplan">
                                    Profile Update
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">..sdfsdf sfs dsf ds sd s.</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection