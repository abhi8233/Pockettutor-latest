@extends('layouts.bookingApp')
@section('css-hooks')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fullcalendar.io/js/fullcalendar-3.0.1/fullcalendar.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        
        #calendar {
        width: 900px;
        margin: 0 auto;
        }

        #wrap {
        width: 1100px;
        margin: 0 auto;
        }

        .closeon {
        border-radius: 5px;
        }

        input {
        width: 50%;
        }

        input[type="text"][readonly] {
        border: 2px solid rgba(0, 0, 0, 0);
        }

        /*info btn*/
        .dropbtn {
        /*background-color: #4CAF50;*/
        background-color: #eee;
        margin: 10px;
        padding: 8px 16px 8px 16px;
        font-size: 16px;
        border: none;
        }

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        margin-left: 100px;
        margin-top: -300px;
        }

        .dropdown-content p {
        color: black;
        padding: 4px 4px;
        text-decoration: none;
        display: block;
        }

        .dropdown-content a:hover {
        background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        }

        .dropdown:hover .dropbtn {
        background-color: grey;
        }

        .dropdown:hover .dropbtn span {
        color: white;
        }
        .fc .fc-state-active, .fc .fc-state-active:focus, .fc .fc-state-active:hover, .fc .fc-state-active:active:focus, .fc .fc-state-active:active:hover, .fc .fc-state-active:active {
            background-color: #0077b6;
            color: #FFFFFF;
            border: solid 2px #065d8b;
        }
        .fc button
        {
            border-color: #0076b5;
            color: #0077b6;
        }
        .fc button:hover, .fc button:focus, .fc button:active, .fc button.active, .fc button:active:focus, .fc button:active:hover, .open > .fc button.dropdown-toggle, .open > .fc button.dropdown-toggle:focus, .open > .fc button.dropdown-toggle:hover {
            background-color: #1b8ecc;
            color: #FFFFFF;
            border: solid 2px #13587e;
        }
        .fc-state-default.fc-corner-left
        {
            border-radius: 25px;
        }
        .fc-state-default.fc-corner-right
        {
            margin-left: 5px;
            border-radius: 25px;
        }
        .fc-prev-button{
            display: none;
        }
        .fc-title{
            font-size: 10.5px;
        }
        .fc-day-top
        {
            pointer-events: none;
        }
        .fc-day-grid-event .fc-content
        {
            /* height: 76px; */
        }
        tr:first-child>td>.fc-day-grid-event
        {    
            margin-top: -24px;
            line-height: 118px;
            background: #ffa2a287;
            color: black;
            width: 97%;
            height: 74px;
            margin-left: 0px;

        }

        .starrate span.ctrl { position:absolute; z-index:2;}
        .starrate { color:var(--secondary); cursor:pointer}
        .starrate.saved { color:var(--dark);}
        .starrate:hover { color:var(--primary);} 
        .starrate.saved:hover { color:var(--orange);}
        
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
                    <div class="d-flex mb-3 pt-width-p-100 justify-content-between align-items-center">
                        <h1 class="pt-font-size-px-22 mb-0">Book your slot</h1>
                        <a href="{{ route('sbooking.index') }}" class="text-decoration-none pt-color-primary fw-normal">My dashboard</a>
                    </div>
                </div>
            </div>

            <form id="frm-BookingSlot" name="frm-BookingSlot" class="bookingSlotFrm" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="row mx-0 mt-3 mb-5">

                    <div class="col-12 mb-2">
                        <label class="col-md-4 col-form-label" style="padding-left: 0px;">Select Specialization</label>
                        <div class="">
                            <select class="select2 front-specialization select2-hidden-accessible" name="specialization" id="specialization">
                                <option value=""> Select Specialization</option>
                                @foreach($specializations as $specialization)
                                <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mb-3 date-time">
                        <label class="col-form-label">Select Date & Time</label>
                        <div class="row">

                            <div id='calendar'></div>

                            <div class="row p-4">
                                <p style="width: 200px;height: 19px;overflow: hidden;"> 
                                    <i class="fa fa-calendar text-primary mr-2"></i> 
                                    <span id="selected_date">un-selected</span>
                                </p>
                                <p> 
                                    <i class="fa fa-clock"></i> 
                                    <span id="selected_date_times" class="badge badge-info">un-selected</span> 
                                    <span class="btn btn-danger btn-xs mr-2" style="display: none;width:100px" id="reset_btn" onclick="reset_input_val()">x Reset Slot</span>
                                </p>
                            </div>

                            <div id='datepicker'></div>

                            {{-- Model --}}
                            <input type="hidden" name="date">
                            
                            <button type="button" id="slotModalBtn" data-toggle="modal" data-target="#slotModal" style="display: none"></button>
                              
                            <div class="modal fade" id="slotModal" tabindex="-1" role="dialog" aria-labelledby="slotModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="slotModalLabel" style="margin-right: 270px;">Here is the available slots</h5>
                                      <button type="button" class="close" data-dismiss="modal" onclick="reset_input_val()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="language-booking d-flex row" id="BookingSlotBody">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" onclick="reset_input_val()" data-dismiss="modal">Not Now</button>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="displaySlotTime">Save Now</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            {{-- Model Close--}}

                        </div>
                        <div id="error_slotdatetime" style="color:red"></div>
                    </div>
                  
                    <div class="col-12 mb-2">
                        <label class="col-form-label">Select Language</label>
                        <div class="language-booking d-flex">
                            @foreach($languages as $language)
                                <label>
                                    <input type="radio" name="language[]" value="{{$language->id}}" class="language">
                                    <span>
                                        {{$language->name}}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                        <div id="error_slotlanguage" style="color:red"></div>
                    </div>
                    
                    <div class="col-12 mb-2">
                       
                        <label class="col-form-label">Rating</label> 
                        <span class="btn btn-danger btn-xs mr-2" style="display: none;width:100px" id="reset_rating_btn" onclick="resetRating()">x Reset Rating</span>
                        
                       
                        <div class="mb-3 py-2 ">
                            <div class="col-2 ml-auto">
                                <input type="hidden" name="star" id="star" value="0.0">
                                <div id="starrate" class="starrate mt-3" data-val="0.0" data-max="5">
                                    <span class="ctrl"></span>
                                    <span class="cont m-1">
                                        <i class="far fa-fw fa-star"></i> 
                                        <i class="far fa-fw fa-star"></i> 
                                        <i class="far fa-fw fa-star"></i> 
                                        <i class="far fa-fw fa-star"></i> 
                                        <i class="far fa-fw fa-star"></i> 
                                    </span>
                                </div>
                            </div>
                            <div id="rating" class="col-3 mr-auto display-4">0.0</div>
                        </div>
                    </div>

                    <div class="col-12 mb-2 tutor-main">
                        <label class="col-form-label">Select Tutor</label>
                        <div class="row mx-0 mt-3" id="tutor_html_id"></div>
                        <input type="text" name="tutor_id" id="tutor_id" style="visibility: hidden;">
                    </div>

                    <button type="submit" class="btn text-decoration-none common-btn" id="btn-booking">
                        Complete Booking
                    </button>
                    <div id="msg"></div>

                </div>
            </form>
        </div>
        <div class="col-12 col-md-3"></div>
    </div>

</div>
@endsection

@section('js-hooks')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js"></script>
<script>
    
    $(document).ready(function() {
        var specialization_id = 0;

        $("#specialization").change(function(){
            specialization_id = $('#specialization').val();
            if ($(this).val() != null) {
                $.ajax({
                    type: "GET",
                    url: "{{route('getTutor')}}",
                    data: {
                        'specialization_id':specialization_id ,
                        'rating': $('#star').val()
                    },
                    beforeSend: function(){
                        $('#tutor_html_id').html('Loading...');
                    },
                    success: function(data) {
                        $("#calendar").fullCalendar('refetchEvents');
                        $("#tutor_html_id").html('');
                        $("#tutor_html_id").html(data);
                    }
                });
            }
        });

        var slot_time;
        $("#displaySlotTime").click(function () {
            $("#selected_date_times").html("");
            var datetimes = '';
            $("input[name='slotList']:checked").each(function (index, obj) {
                slot_time = ($(this).val() > "12:00:00") ? "PM" : "AM";
                $("#selected_date_times").append(`${$(this).val()} -${slot_time}`);
                datetimes = $(this).val();
            });
            if(datetimes!=""){
                $.ajax({
                    type: "GET",
                    url: "{{route('getTutor')}}",
                    data: {
                        'specialization_id': $('#specialization').val(),
                        'date' : $('#selected_date').html(),
                        'time' : datetimes
                    },
                    beforeSend: function(){
                        $('#tutor_html_id').html('Loading...');
                    },
                    success: function(data) {
                        $("#tutor_html_id").html('');
                        $("#tutor_html_id").html(data);
                    }
                });
            }else{
                reset_input_val();
            }
        });

        $('.language').change(function(){
            if ($(this).val() != null) {
                $.ajax({
                    type: "GET",
                    url: "{{route('getTutor')}}",
                    data: {
                        'specialization_id': $('#specialization').val(),
                        'date' : $('#selected_date').html(),
                        'time' : $('#selected_date_times').html(),
                        'language_id': $(this).val()
                    },
                    beforeSend: function(){
                        $('#tutor_html_id').html('Loading...');
                    },
                    success: function(data) {
                        $("#tutor_html_id").html('');
                        $("#tutor_html_id").html(data);
                    }
                });
            }
        });

            var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var startDate = new Date('2022/02/18');
        var endDate = new Date('2022/04/18');

            
        $("#calendar").fullCalendar({

            header: {
                left: "next today",
                // center: "title",
                right: "title"
            },
            // themeSystem: 'bootstrap',
            defaultView: "month",
            navLinks: true, // can click day/week names to navigate views
            // selectable: true,
            selectHelper: true,
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            events:{
                url: "{{ route('getTutorSlotlist') }}",
                type:"post",
                data:{_token:"{{ csrf_token() }}"}
            },
            /*  events:[
                {
                    start: "2022-01-19",
                    groupId: 4,
                    title: "No Slot Available"
                },
                {
                    start: "2022-01-20",
                    groupId: 4,
                    title: "No Slot Available"
                }
            ], */
            selectConstraint: {
                start: $.fullCalendar.moment().subtract(1, 'days'),
                end: $.fullCalendar.moment().startOf('month').add(1, 'month')
            },
            select: function(start, end) {
              
                // console.log("A-------",start,end);
                var activeDate = JSON.stringify(start._d);
                var specialization_id = $('#specialization').val();
                var slot_time = $("input[name='slotList']:checked").val();
                $.ajax({
                    url: '{{ route("getDateSlotsList") }}',
                    type: 'post',
                    data: {
                        activeDate:activeDate,
                        slot_time:slot_time,
                        specialization_id:specialization_id,
                        _token:"{{ csrf_token() }}"
                    },
                    success: function (response) {
                        $("input[name='date']").val(activeDate);
                        $("#selected_date").html(start._d);
                        $("#slotModalBtn").click();
                        $("#BookingSlotBody").html(response);
                        $("#reset_btn").css("display","block");
                        // console.log(response);
                        // calendar.refetchEvents();
                        // swal("Slots copied successfully.");
                    }
                });
                // console.log(activeStartDate);
            },
            viewRender: function(currentView){
                var minDate = moment(),
                maxDate = moment().add(60,'days');
                // // Past
                // if (minDate >= currentView.start && minDate <= currentView.end) {
                //     $(".fc-prev-button").prop('disabled', true); 
                //     $(".fc-prev-button").addClass('fc-state-disabled'); 
                // }
                // else {
                //     $(".fc-prev-button").removeClass('fc-state-disabled'); 
                //     $(".fc-prev-button").prop('disabled', false); 
                // }
                // Future
                if (maxDate >= currentView.start && maxDate <= currentView.end) {
                    $(".fc-next-button").prop('disabled', true); 
                    $(".fc-next-button").addClass('fc-state-disabled'); 
                } else {
                    $(".fc-next-button").removeClass('fc-state-disabled'); 
                    $(".fc-next-button").prop('disabled', false); 
                }
            },
            eventRender: function(event, element) {
                console.log("B-------",event,element);
            },
            eventClick: function(calEvent, calEvent) {
                console.log("C-------",calEvent,calEvent);
            }
        });
    });

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "{{route('getTutor')}}",
            beforeSend: function(){
                $('#tutor_html_id').html('Loading...');
            },
            success: function(data) {

                $("#tutor_html_id").html(data);
                $("#calendar").fullCalendar('refetchEvents');
            }
        });

        /* selected tutor identify and fill in tutor_id */
        $(document).on('click', '.tutor-inner', function() {
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
                slotList: {
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
                slotList: {
                    required: "Time is required"
                },
            },
            submitHandler: function(form) {
                // console.log(form);
                // return false;
                // alert('valid form submitted'); 
                $.ajax({
                    type: "POST",
                    url: "{{route('sbooking.store')}}",
                    data: new FormData($('#frm-BookingSlot')[0]),
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $('#btn-booking').html('Loading...');
                    },
                    success: function(data) {
                        // console.log(data);
                        // alert(data.status);
                        if (data.status == 200) {
                            $("#msg").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Booking booked successfully.</div>');
                            setTimeout(function() {
                                window.location = "{{ route('sbooking.index') }}";
                            }, 1000);
                        } else if (data.status == 401) {
                            $("#msg").after('<div class="alert alert-warning alert-dismissible" id="myAlert">You have no balance in you account.</div>');
                        }else if (data.status == 500) {
                            $("#msg").after('<div class="alert alert-warning alert-dismissible" id="myAlert"><strong>Google Meet!</strong> Creadentials not found.</div>');
                        } else {
                            // alert("Opps..! Something Went to Wrong.")
                            $("#msg").after('<div class="alert alert-danger alert-dismissible" id="myAlert"><strong>Opps..!</strong> Something Went to Wrong.</div>');
                        }
                    },
                    error: function(response) {
                        // alert("ji");
                        // console.log(response.responseJSON.errors.tutor_email)
                        if(response.responseJSON.errors != ''){
                            $('#error_slotdatetime').text(response.responseJSON.errors.date);
                            $('#error_slotlanguage').text(response.responseJSON.errors.language);
                        }
                    }
                });
                return false;
            }
        });
    });

    function reset_input_val(){
        $("input[name='slotList']").attr('checked','false');
        $("#selected_date_times").html("un-selected");
        $("#selected_date").html("un-selected");
        $("input[name='date']").val("");
        $("#reset_btn").css("display","none");
    }

        
    function resetRating()
    {
        $("#star").val("0.0");
        $("#rating").html("0.0");
        $("#reset_rating_btn").css('display','none');
        $.ajax({
            type: "GET",
            url: "{{route('getTutor')}}",
            data: {
                'specialization_id': $('#specialization').val(),
                'date' : $('#selected_date').html(),
                'time' : $('#selected_date_times').html(),
                'language_id': $('.language').val(),
                'rating': 0.0
            },
            beforeSend: function(){
                $('#tutor_html_id').html('Loading...');
            },
            success: function(data) {
                $("#tutor_html_id").html('');
                $("#tutor_html_id").html(data);
            }
        });
    }
    var valueHover = 0;

    $(".starrate").on("click", function () {
        // alert("starrate click");

        $(this).data('val', valueHover);

        $("#reset_rating_btn").css('display','block');
        $(this).addClass('saved');

        $.ajax({
            type: "GET",
            url: "{{route('getTutor')}}",
            data: {
                'specialization_id': $('#specialization').val(),
                'date' : $('#selected_date').html(),
                'time' : $('#selected_date_times').html(),
                'language_id': $('.language').val(),
                'rating': $("#star").val()
            },
            beforeSend: function(){
                $('#tutor_html_id').html('Loading...');
            },
            success: function(data) {
                $("#tutor_html_id").html('');
                $("#tutor_html_id").html(data);
            }
        });
    });

    $(".starrate").on("mouseout", function () {
        // alert("mouseout");
        upStars($(this).data('val'));
    });

    $(".starrate span.ctrl").on("mousemove", function (e) {
        // alert("mousemove");
        var maxV = parseInt($(this).parent("div").data('max'))
        valueHover = Math.ceil(calcSliderPos(e, maxV) * 2) / 2;
        upStars(valueHover);
    });

    $(".starrate span.ctrl").width($(".starrate span.cont").width());
    $(".starrate span.ctrl").height($(".starrate span.cont").height());

    function calcSliderPos(e, maxV) {
        return (e.offsetX / e.target.clientWidth) * parseInt(maxV, 10);
    }

    function upStars(val) {

        var val = parseFloat(val);
        $("#rating").html(val.toFixed(1));
        $("#starrate").attr('data-val',val.toFixed(1));
        $("#star").val(val.toFixed(1));

        var full = Number.isInteger(val);
        val = parseInt(val);
        var stars = $("#starrate i");

        stars.slice(0, val).attr("class", "fas fa-fw fa-star");
        if (!full) { 
            stars.slice(val, val + 1).attr("class", "fas fa-fw fa-star-half-alt"); 
            val++;
        }
        stars.slice(val, 5).attr("class", "far fa-fw fa-star");
    }
</script>
@endsection