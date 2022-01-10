@extends('layouts.frontApp')

@section('content')
<div class="top-heading">
    <h1 class="m-0">About Us</h1>
</div>

<div class="container about-welcome pt-5 pb-5">
    <div class="row mx-0 g-0">
        <div class="col-12 col-md-8">
            <h2 class="fw-normal pt-font-size-px-32 mb-4">Welcome to the <span class="pt-color-primary fw-bold">Pocket tutor</span></h2>
            <p class="pt-font-size-px-16">Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .Lorem ipsum dolor sit amet, coectetur adipiscing elit.Suspendisse varius enim in eros. Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .Lorem ipsum dolor sit amet, coectetur adipiscing elit.Suspendisse varius enim in eros. Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .Lorem ipsum dolor sit amet, coectetur adipiscing elit.Suspendisse varius enim in eros. Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .Lorem ipsum dolor sit amet,coectetur adipiscing elit.Suspendisse varius enim in eros .</p>
        </div>
        <div class="col-12 col-md-4 right-section">
            <img src="{{URL::asset('assets/images/about-right.png')}}" class="pt-width-p-100">
        </div>
    </div>
</div>

<div class="about-sec pt-bg-bgcolor pt-4 pb-4">
    <div class="container">
        <div class="row mx-0 g-5">
            <div class="text-center">
                <h2>Our Process</h2>
                <p>Lorem ipsum dolor sit amet, coectetur adipiscing elit. Suspendisse varius enim in eros .</p>
            </div>
            <img src="{{URL::asset('assets/images/process.png')}}" class="pt-width-p-100">
        </div>
    </div>
</div>

<div class="about-third pt-5 pb-5">
    <div class="">
        <div class="row mx-0 g-5">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-between pe-5">
                <h3 class="mb-0 pt-font-size-px-36 fw-normal">Get Started with us</h3>
                <div class="d-flex justify-content-between mb-4">
                    <button class="btn text-decoration-none common-btn pt-width-p-auto">
                        Register Now
                    </button>
                    <button class="btn text-decoration-none common-btn pt-width-p-auto">
                        Contact Us
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6 p-0">
                <img src="{{URL::asset('assets/images/about-bottom.png')}}" class="pt-width-p-100">
            </div>
        </div>
    </div>
</div>

<!-- html -->
@endsection