@extends('layouts.bookingApp')
@section('css-hooks')
<style type="text/css">
    label.error{
        color:red;
    }
</style>
@endsection
@section('content')
<div class="booking">
    <div class="row mx-0">
        <div class="col-12 col-md-3"></div>

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
            
            <form id="frm-BookingSlot" name="frm-BookingSlot" class="bookingSlotFrm" enctype="multipart/form-data">
                @method('POST')
                @csrf
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
                            <select class="" name="language" id="language">
                                <option value=""> Select Language</option>
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mb-2 tutor-main">
                        <label class="col-md-4 col-form-label">Select Tutor</label>
                        <div class="row mx-0 mt-3" id="tutor_html_id"></div>
                        <input type="text" name="tutor_id" id="tutor_id" style="visibility: hidden;">
                    </div>

                    <div class="col-12 mb-5 date-time">
                        <label class="col-md-4 col-form-label">Select Date & Time</label>
                        <div class="row mb-5">
                            <div class="col-12 col-md-6">
                                <input type="date" id="date" name="date" placeholder="Select Date" class="">
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="time" id="time" name="time" placeholder="Select Time" class="">
                            </div>
                        </div>
                        <button type="submit" class="btn text-decoration-none common-btn"  id="btn-booking">
                            Complete Booking
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <div class="col-12 col-md-3"></div>
    </div>

</div>
@endsection

@section('js-hooks')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "{{route('getTutor')}}",
            success: function (data) {
                $("#tutor_html_id").html(data);
            }
        });

        $(document).on('change', '#specialization', function () {
            if ($(this).val() != null) {
                $.ajax({
                    type: "GET",
                    url: "{{route('getTutor')}}",
                    data: {
                        'specialization_id': $(this).val(),
                        'language_id': $('#language').val()
                    },
                    // beforeSend: function(){
                    //     $('#frm-BookingSlot').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
                    // },
                    success: function (data) {
                        $("#tutor_html_id").html(data);
                    }
                });
            }
        });

        $(document).on('change', '#language', function () {
            if ($(this).val() != null) {
                $.ajax({
                    type: "GET",
                    url: "{{route('getTutor')}}",
                    data: {
                        'language_id': $(this).val(),
                        'specialization_id': $('#specialization').val()
                    },
                    // beforeSend: function(){
                    //     $('#frm-BookingSlot').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
                    // },
                    success: function (data) {
                        $("#tutor_html_id").html(data);
                    }
                });
            }
        });

        /* selected tutor identify and fill in tutor_id */
        $(document).on('click','.tutor-inner',function(){
            var tutor_id = $(this).attr('id');
            $("#tutor_id").val();
            $('.tutor-inner').removeClass('active');
            $(this).addClass('active');
            $("#tutor_id").val(tutor_id);
        });

        $("#frm-BookingSlot").validate({
            rules: {
                specialization: {
                    required: true
                },
                language: {
                    required: true
                },
                tutor_id: {
                    required: true
                },
                date: {
                    required: true
                },
                time: {
                    required: true
                },
            },
            messages: {
                specialization: {
                    required: "Specialization is required"
                },
                language: {
                    required: "Language is required"
                },
                tutor_id: {
                    required: "Tutor is required"
                },
                date: {
                    required: "Date is required"
                },
                time: {
                    required: "Time is required"
                },
            },
            submitHandler: function (form) { 
                // alert('valid form submitted'); 
                $.ajax({
                    type: "POST",
                    url: "{{route('sbooking.store')}}",
                    data: new FormData($('#frm-BookingSlot')[0]),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status === 'success') {
                            window.location ="{{ route('sbooking.index') }}";
                        } else if (data.status === 'error') {
                            alert("Opps..! Something Went to Wrong.")
                        }
                    }
                });
                return false; 
            }
        });
        
        // $('body').on('click','#btn-booking',function(e){
        //     e.preventDefault();
        //     if ($(".bookingslotFrm").valid()) {
        //         $.ajax({
        //             type: "POST",
        //             url: "{{route('sbooking.store')}}",
        //             data: new FormData($('.bookingslotFrm')[0]),
        //             processData: false,
        //             contentType: false,
        //             success: function (data) {
        //                 if (data.status === 'success') {
        //                     window.location ="{{ route('sbooking.index') }}";
        //                 } else if (data.status === 'error') {
        //                     alert("Opps..! Something Went to Wrong.")
        //                 }
        //             }
        //         });
        //     } else {
        //         e.preventDefault();
        //     }
        // });
    });
</script>
@endsection