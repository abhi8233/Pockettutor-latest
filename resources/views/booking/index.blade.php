@extends('layouts.bookingApp')

@section('content')
<div class="booking">
    <div class="row mx-0">
        <div class="col-12 col-md-3">

        </div>
        <div class="col-12 col-md-6 booking-main">
            <div class="row mx-0 mt-3 mb-3">
                <div class="d-flex flex-column align-items-center">
                    <div class="logo mb-3">
                        <img src="{{URL::asset('assets/images/logo.png')}}" class="pt-height-px-40" />
                    </div>
                    <h1 class="pt-font-size-px-22">Book your slot</h1>
                    <a  href="{{ route('sbooking.index') }}">My dashboard</a>
                </div>
            </div>

            <div class="row mx-0 mt-3">
                <div class="col-12 mb-2">
                    <label class="col-md-4 col-form-label">Select Specialization</label>
                    <div class="">
                        <select class="select2 front-specialization select2-hidden-accessible" name="specialization" id="specialization">
                            <option value=""> Select Specialization</option>
                            @foreach($specializations as $specialization)
                                <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <label class="col-md-4 col-form-label">Select Language</label>
                    <div class="">
                        <select class="language" name="language" id="language">
                            <option value=""> Select Language</option>
                            @foreach($languages as $language)
                                <option value="{{$language->id}}">{{$language->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 mb-2 tutor-main">
                    <label class="col-md-4 col-form-label">Select Tutor</label>
                    <div class="row mx-0 mt-3">
                        <div class="col-12 col-md-3">
                            <div class="d-flex flex-column justify-content-center align-items-center tutor-inner">
                                <div class="profile-img">
                                    <img src="../assets/images/profile.png" class="pt-width-px-88 pt-height-p-auto mb-1 tutor-img" />
                                    <img src="../assets/images/flag.png" class="flag" />
                                </div>
                                <span class="tutor-name">ABC Tutor</span>
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="d-flex flex-column justify-content-center align-items-center tutor-inner">
                                <div class="profile-img">
                                    <img src="../assets/images/profile.png" class="pt-width-px-88 pt-height-p-auto mb-1 tutor-img" />
                                    <img src="../assets/images/flag1.png" class="flag" />
                                </div>
                                <span class="tutor-name">ABC Tutor</span>
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="d-flex flex-column justify-content-center align-items-center tutor-inner">
                                <div class="profile-img">
                                    <img src="../assets/images/profile.png" class="pt-width-px-88 pt-height-p-auto mb-1 tutor-img" />
                                    <img src="../assets/images/flag.png" class="flag" />
                                </div>
                                <span class="tutor-name">ABC Tutor</span>
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="d-flex flex-column justify-content-center align-items-center tutor-inner">
                                <div class="profile-img">
                                    <img src="../assets/images/profile.png" class="pt-width-px-88 pt-height-p-auto mb-1 tutor-img" />
                                    <img src="../assets/images/flag1.png" class="flag" />
                                </div>
                                <span class="tutor-name">ABC Tutor</span>
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-5 date-time">
                    <label class="col-md-4 col-form-label">Select Date & Time</label>
                    <div class="row mb-5">
                        <div class="col-12 col-md-6">
                            <input type="date" id="date" name="date" placeholder="Select Date" class="">
                            <!-- <input placeholder="Date" class="textbox-n" type="text" onfocus="(this.type='date')" id="date"> -->
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="time" id="time" name="time" placeholder="Select Time" class="">
                        </div>
                    </div>
                    <button class="btn text-decoration-none common-btn " data-bs-toggle="modal" data-bs-target="#newplan">
                        Complete Booking
                    </button>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-3">

        </div>
    </div>

</div>
<!-- html -->
@endsection