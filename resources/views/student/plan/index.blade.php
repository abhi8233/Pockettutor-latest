@extends('layouts.studentApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-cash" aria-hidden="true"></i>
            <span class="ps-1">Plan Info</span>
        </label>
        <div class="d-flex align-items-center">
            <button class="btn text-decoration-none common-btn ms-2" data-bs-toggle="modal" data-bs-target="#upgradeplan">
                Upgrade Plan
            </button>
        </div>
    </div>
    <div class="student-list bg-white mt-4">
        <table id="student_list" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Plan Name</th>
                    <th>Monthly Amount</th>
                    <th>Minutes</th>
                    <th>Left Minutes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>


<!-- Upgrade Plan -->
<div class="modal fade" id="upgradeplan" tabindex="-1" aria-labelledby="upgradeplanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upgradeplanLabel">Upgrade Plan</h5>
                <button type="button" class="">
                    <i class="mdi mdi-close-circle-outline" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close"></i>
                </button>
            </div>
            <div class="modal-body pb-5">
                <div class="mb-3 subscription">
                    <div class="row">
                        <div class="col-12 col-md-3 plan-main">
                            <div for="option-Basic" class="option">
                                <div class="d-flex flex-column justify-content-around pt-height-p-100">
                                    <div class="pt-font-size-px-16">BASIC</div>
                                    <div class="price-time-main">
                                        <div class="pt-font-size-px-24 price pt-color-primary fw-500" style="line-height: 1;">$44.99</div>
                                        <div class="pt-font-size-px-12 minute">Minutes :90</div>
                                    </div>
                                    <button class="btn text-decoration-none common-btn"  data-bs-toggle="modal" data-bs-target="#payment">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 plan-main">
                            <div for="option-Plus" class="option">
                                <div class="d-flex flex-column justify-content-around pt-height-p-100">
                                    <div class="pt-font-size-px-16">PLUS</div>
                                    <div class="price-time-main">
                                        <div class="pt-font-size-px-24 price pt-color-primary fw-500" style="line-height: 1;">$74.99</div>
                                        <div class="pt-font-size-px-12 minute">Minutes :180</div>
                                    </div>
                                    <button class="btn text-decoration-none common-btn" data-bs-toggle="modal" data-bs-target="#payment">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 plan-main">
                            <div for="option-Premium" class="option">
                                <div class="d-flex flex-column justify-content-around pt-height-p-100">
                                    <div class="pt-font-size-px-16">PREMIUM</div>
                                    <div class="price-time-main">
                                        <div class="pt-font-size-px-24 price pt-color-primary fw-500" style="line-height: 1;">$114.99</div>
                                        <div class="pt-font-size-px-12 minute">Minutes :300</div>
                                    </div>
                                    <button class="btn text-decoration-none common-btn" data-bs-toggle="modal" data-bs-target="#payment">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 plan-main">
                            <div for="option-Mentor" class="option">
                                <div class="d-flex flex-column justify-content-around pt-height-p-100">
                                    <div class="pt-font-size-px-16">MENTOR</div>
                                    <div class="price-time-main">
                                        <div class="pt-font-size-px-24 price pt-color-primary fw-500" style="line-height: 1;">$299.99</div>
                                        <div class="pt-font-size-px-12 minute">Minutes :900</div>
                                    </div>
                                    <button class="btn text-decoration-none common-btn" data-bs-toggle="modal" data-bs-target="#payment">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Upgrade Plan -->
<div class="modal fade" id="payment" tabindex="-1" aria-labelledby="paymentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentLabel">Payment</h5>
                <button type="button" class="">
                    <i class="mdi mdi-close-circle-outline" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close"></i>
                </button>
            </div>
            <div class="modal-body pb-5">
                <div class="mb-3 subscription">
                    <div class="row">
                        <div class="col-12 col-md-3 plan-main">
                            Contents Here
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection