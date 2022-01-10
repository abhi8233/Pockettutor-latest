@extends('layouts.frontApp')

@section('content')
<div class="banner mb-5">
    <div class="row mx-0 pt-height-p-100">
        <div class="col-12 col-md-7 d-flex align-items-end">
            <img src="{{URL::asset('assets/images/banner-lady.png')}}" class="">
        </div>
        <div class="col-12 col-md-5 d-flex align-items-center">
            <div class="text-center pt-width-p-80 banner-right-contents">
                <h1 class="pt-font-size-px-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1>
                <p>With us, dive deeper into the ocean of knowledge</p>
                <button class="btn text-decoration-none common-btn">
                    Contact Us
                </button>
            </div>
        </div>
    </div>
</div>

<!-- second section -->
<div class="second-sec pt-4 pb-4">
    <div class="container">
        <div class="row mx-0 g-5">
            <div class="text-center">
                <h2>Benefits of joining pocket tutor</h2>
                <p>Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .</p>
            </div>
            <div class="col-12 col-md-6 d-flex align-items-end mt-3">
                <div class="second-contents">
                    <div class="icon mb-3">
                        <i class="mdi mdi-account" aria-hidden="true"></i>
                    </div>
                    <h3 class="pt-font-size-px-22 mb-3">FOR STUDENTS & PROFESSIONALS</h3>
                    <p class="pt-width-p-60 mb-0">Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .</p>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center mt-3">
                <div class="second-contents">
                    <div class="icon mb-3">
                        <i class="mdi mdi-account" aria-hidden="true"></i>
                    </div>
                    <h3 class="pt-font-size-px-22 mb-3">FOR PROFESSORS & TUTORS</h3>
                    <p class="pt-width-p-60 mb-0">Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- third section -->
<div class="third-sec pt-4 pb-4">
    <div class="row mx-0 g-0">
        <div class="col-12 col-md-8 d-flex align-items-start flex-column justify-content-between mt-3 left-content">
            <div class="top">
                <h2 class="text-uppercase">Why <span class="pt-color-primary">Pocket tutor?</span></h2>
                <p class="mb-0 pt-font-size-px-18">Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .Lorem ipsum dolor sit amet, coectetur adipiscing elit.Suspendisse varius enim in eros .</p>
                <p class="mb-0 pt-font-size-px-18">Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .Lorem ipsum dolor sit amet, coectetur adipiscing elit.Suspendisse varius enim in eros .</p>
            </div>
            <div class="bottom">
                <button class="btn text-decoration-none common-btn">
                    JOIN NOW
                </button>
            </div>
        </div>
        <div class="col-12 col-md-4 mt-3 right-section">
            <img src="{{URL::asset('assets/images/third-right-img.png')}}" class="pt-width-p-100">
        </div>
    </div>
</div>

<!-- forth section -->
<div class="forth-sec pt-4 pb-5">
    <div class="container">
        <div class="row mx-0 g-5">
            <div class="text-center">
                <h2>Our Mission, Vision & Values</h2>
                <p>Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .</p>
            </div>
            <div class="col-12 col-md-12 d-flex justify-content-between align-items-center mt-3 boxes-main">
                <div class="boxes-inner">
                    <img src="{{URL::asset('assets/images/home-mission.png')}}" class="">
                    <h6 class="pt-font-size-px-20">Our Mission</h6>
                    <p>Donec facilisis tortor ut augue lacinia, at viverra est semper. Sed sapien metus, scelerisque nec pharetra id, tempor a tortor.</p>
                </div>

                <div class="boxes-inner center">
                    <img src="{{URL::asset('assets/images/home-vision.png')}}" class="">
                    <h6 class="pt-font-size-px-20">Our Vision</h6>
                    <p>Donec facilisis tortor ut augue lacinia, at viverra est semper. Sed sapien metus, scelerisque nec pharetra id, tempor a tortor.</p>
                </div>

                <div class="boxes-inner">
                    <img src="{{URL::asset('assets/images/home-values.png')}}" class="">
                    <h6 class="pt-font-size-px-20">Our Values</h6>
                    <p>Donec facilisis tortor ut augue lacinia, at viverra est semper. Sed sapien metus, scelerisque nec pharetra id, tempor a tortor.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- fifth section -->
<div class="fifth-sec pt-5 pb-5">
    <div class="container">
        <div class="row mx-0 g-5">
            <div class="text-center">
                <h2>Our Mission, Vision & Values</h2>
                <p>Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .</p>
            </div>
            <div class="col-12 col-md-12 d-flex justify-content-between align-items-center mt-3 plan-main">
                <div class="plan-inner box-shadow ">
                    <h6 class="">Basic</h6>
                    <div class="price">
                        <p>$64</p>
                        <span>per month</span>
                    </div>
                    <button class="btn text-decoration-none common-btn">
                        Get Started
                    </button>
                </div>

                <div class="plan-inner box-shadow center">
                    <h6 class="">Pro</h6>
                    <div class="price">
                        <p>$64</p>
                        <span>per month</span>
                    </div>
                    <button class="btn text-decoration-none common-btn">
                        Get Started
                    </button>
                </div>

                <div class="plan-inner box-shadow ">
                    <h6 class="">Advance</h6>
                    <div class="price">
                        <p>$64</p>
                        <span>per month</span>
                    </div>
                    <button class="btn text-decoration-none common-btn">
                        Get Started
                    </button>
                </div>

            </div>
            <div class="view-more-btn">
                <button class="btn text-decoration-none common-btn">
                    View More
                </button>
            </div>
        </div>
    </div>
</div>

<!-- sixth section -->
<div class="sixth-sec pt-5 pb-5">
    <div class="container">
        <div class="row mx-0 g-5">
            <div class="text-center">
                <h2>Check what's our student say about us!</h2>
                <p>Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .</p>
            </div>
            <div class="col-12 col-md-12 mt-4">
                <div class="owl-carousel owl-theme">
                    <div class="owl-item">
                        <img src="{{URL::asset('assets/images/profile.png')}}" class="">
                        <div class="desc">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since
                        </div>
                        <div class="name">jams smith</div>
                    </div>
                    <div class="owl-item">
                        <img src="{{URL::asset('assets/images/profile.png')}}" class="">
                        <div class="desc">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since
                        </div>
                        <div class="name">jams smith</div>
                    </div>
                    <div class="owl-item">
                        <img src="{{URL::asset('assets/images/profile.png')}}" class="">
                        <div class="desc">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since
                        </div>
                        <div class="name">jams smith</div>
                    </div>
                    <div class="owl-item">
                        <img src="{{URL::asset('assets/images/profile.png')}}" class="">
                        <div class="desc">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since
                        </div>
                        <div class="name">jams smith</div>
                    </div>
                    <div class="owl-item">
                        <img src="{{URL::asset('assets/images/profile.png')}}" class="">
                        <div class="desc">
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since
                        </div>
                        <div class="name">jams smith</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- html -->
@endsection