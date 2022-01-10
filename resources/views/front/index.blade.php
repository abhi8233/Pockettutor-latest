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
            <div class="col-12 col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="img-box"><img src="/examples/images/clients/3.jpg" alt=""></div>
                            <p class="testimonial">Phasellus vitae suscipit justo. Mauris pharetra feugiat ante id lacinia. Etiam faucibus mauris id tempor egestas. Duis luctus turpis at accumsan tincidunt. Phasellus risus risus, volutpat vel tellus ac, tincidunt fringilla massa. Etiam hendrerit dolor eget rutrum.</p>
                            <p class="overview"><b>Michael Holz</b>Seo Analyst at <a href="#">OsCorp Tech.</a></p>
                            <div class="star-rating">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="/examples/images/clients/1.jpg" alt=""></div>
                            <p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Vestibulum idac nisl bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                            <p class="overview"><b>Paula Wilson</b>Media Analyst at <a href="#">SkyNet Inc.</a></p>
                            <div class="star-rating">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="/examples/images/clients/2.jpg" alt=""></div>
                            <p class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Utmtc tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio. Phasellus auctor velit.</p>
                            <p class="overview"><b>Antonio Moreno</b>Web Developer at <a href="#">Circle Ltd.</a></p>
                            <div class="star-rating">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- html -->
@endsection