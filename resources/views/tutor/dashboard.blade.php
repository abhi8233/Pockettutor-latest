@extends('layouts.tutorApp')

@section('css-hooks')
    <style>
        #calendar_loader
        {
            position: absolute;
            background: #000000b5;
            height: 113%;
            width: 78.5%;
            z-index: 9;
            font-size: 50px;
            color: #fff;
            line-height: 15;
            text-align: center;
            display: none;
        }
        .fc-timegrid-event-short .fc-event-time:after
        {
            content: '';
        }
        .fc .fc-col-header-cell-cushion
        {
            display: inline-block;
            text-decoration: unset;
            padding: 2px 4px;
            pointer-events: none;
        }
    </style>

@endsection
@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-view-dashboard-outline" aria-hidden="true"></i>
            <span class="ps-1">Dashboard</span>
        </label>
        <div class="page-title">
            <i class="mdi mdi-calendar-clock" aria-hidden="true" title="total meeting hours"></i>
             {{ $totalMeetingHours }} Hrs
        </div>
    </div>




    <!-- <div class="availability-main email-template student-list box-main bg-white mt-4">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <div>Set Availability Type</div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="monthly" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Monthly</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="weekly" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="false">Weekly</button>
                </li>
            </ul>
        </ul>
        <div class="tab-content tab-main-common" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="monthly">

                <div class="row no-gutters pt-width-p-100">
                    <div class="col-12 col-md-3 week-selection">
                        <ul class="p-0 list-style-none mt-3">
                            <li><span class="active">First Week</span></li>
                            <li><span class="">Second Week</span></li>
                            <li><span class="">Third Week</span></li>
                            <li><span class="">Fourth Week</span></li>
                            <li><span class="">Fifth Week</span></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-9 weekdays">
                        <ul class="p-0 list-style-none mt-3 ">
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="row no-gutters pt-width-p-100">
                                    <div class="col-12 col-md-7 d-flex justify-content-evenly">
                                        <div class="text">
                                            Monday
                                        </div>
                                        <div class="radio">
                                            <div class="form-check form-switch ps-0 ">
                                                <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 d-flex time p-0">
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="10">10:00 AM</option>
                                            <option value="10_30">10:30 AM</option>
                                        </select>
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="AL">10:00 AM</option>
                                            <option value="WY">10:30 AM</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex justify-content-between align-items-center">
                                <div class="row no-gutters pt-width-p-100">
                                    <div class="col-12 col-md-7 d-flex justify-content-evenly">
                                        <div class="text">
                                            Tuesday
                                        </div>
                                        <div class="radio">
                                            <div class="form-check form-switch ps-0 ">
                                                <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 d-flex time p-0">
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="10">10:00 AM</option>
                                            <option value="10_30">10:30 AM</option>
                                        </select>
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="AL">10:00 AM</option>
                                            <option value="WY">10:30 AM</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex justify-content-between align-items-center">
                                <div class="row no-gutters pt-width-p-100">
                                    <div class="col-12 col-md-7 d-flex justify-content-evenly">
                                        <div class="text">
                                            Wednesday
                                        </div>
                                        <div class="radio">
                                            <div class="form-check form-switch ps-0 ">
                                                <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 d-flex time p-0">
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="10">10:00 AM</option>
                                            <option value="10_30">10:30 AM</option>
                                        </select>
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="AL">10:00 AM</option>
                                            <option value="WY">10:30 AM</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex justify-content-between align-items-center">
                                <div class="row no-gutters pt-width-p-100">
                                    <div class="col-12 col-md-7 d-flex justify-content-evenly">
                                        <div class="text">
                                            Thursday
                                        </div>
                                        <div class="radio">
                                            <div class="form-check form-switch ps-0 ">
                                                <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 d-flex time p-0">
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="10">10:00 AM</option>
                                            <option value="10_30">10:30 AM</option>
                                        </select>
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="AL">10:00 AM</option>
                                            <option value="WY">10:30 AM</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex justify-content-between align-items-center">
                                <div class="row no-gutters pt-width-p-100">
                                    <div class="col-12 col-md-7 d-flex justify-content-evenly">
                                        <div class="text">
                                            Friday
                                        </div>
                                        <div class="radio">
                                            <div class="form-check form-switch ps-0 ">
                                                <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 d-flex time p-0">
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="10">10:00 AM</option>
                                            <option value="10_30">10:30 AM</option>
                                        </select>
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="AL">10:00 AM</option>
                                            <option value="WY">10:30 AM</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex justify-content-between align-items-center">
                                <div class="row no-gutters pt-width-p-100">
                                    <div class="col-12 col-md-7 d-flex justify-content-evenly">
                                        <div class="text">
                                            Saturday
                                        </div>
                                        <div class="radio">
                                            <div class="form-check form-switch ps-0 ">
                                                <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 d-flex time p-0">
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="10">10:00 AM</option>
                                            <option value="10_30">10:30 AM</option>
                                        </select>
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="AL">10:00 AM</option>
                                            <option value="WY">10:30 AM</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex justify-content-between align-items-center">
                                <div class="row no-gutters pt-width-p-100">
                                    <div class="col-12 col-md-7 d-flex justify-content-evenly">
                                        <div class="text">
                                            Sunday
                                        </div>
                                        <div class="radio">
                                            <div class="form-check form-switch ps-0 ">
                                                <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 d-flex time p-0">
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="10">10:00 AM</option>
                                            <option value="10_30">10:30 AM</option>
                                        </select>
                                        <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                            <option value="AL">10:00 AM</option>
                                            <option value="WY">10:30 AM</option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="row mt-4">
                            <div class="col-12 col-md-7">
                            </div>
                            <div class="col-12 col-md-5">
                                <button class="btn text-decoration-none common-btn " data-bs-toggle="modal" data-bs-target="#newplan">
                                    Save Availability
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="weekly">
                <ul class="p-0 list-style-none mt-3">
                    <li class="d-flex justify-content-between align-items-center">
                        <div class="row no-gutters pt-width-p-100">
                            <div class="col-12 col-md-4 text">
                                Monday
                            </div>
                            <div class="col-12 col-md-4 radio d-flex justify-content-center">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 d-flex time p-0">
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="10">10:00 AM</option>
                                    <option value="10_30">10:30 AM</option>
                                </select>
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="AL">10:00 AM</option>
                                    <option value="WY">10:30 AM</option>
                                </select>
                            </div>
                        </div>
                    </li>

                    <li class="d-flex justify-content-between align-items-center">
                        <div class="row no-gutters pt-width-p-100">
                            <div class="col-12 col-md-4 text">
                                Tuesday
                            </div>
                            <div class="col-12 col-md-4 radio d-flex justify-content-center">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 d-flex time p-0">
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="10">10:00 AM</option>
                                    <option value="10_30">10:30 AM</option>
                                </select>
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="AL">10:00 AM</option>
                                    <option value="WY">10:30 AM</option>
                                </select>
                            </div>
                        </div>
                    </li>

                    <li class="d-flex justify-content-between align-items-center">
                        <div class="row no-gutters pt-width-p-100">
                            <div class="col-12 col-md-4 text">
                                Wednesday
                            </div>
                            <div class="col-12 col-md-4 radio d-flex justify-content-center">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 d-flex time p-0">
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="10">10:00 AM</option>
                                    <option value="10_30">10:30 AM</option>
                                </select>
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="AL">10:00 AM</option>
                                    <option value="WY">10:30 AM</option>
                                </select>
                            </div>
                        </div>
                    </li>

                    <li class="d-flex justify-content-between align-items-center">
                        <div class="row no-gutters pt-width-p-100">
                            <div class="col-12 col-md-4 text">
                                Thursday
                            </div>
                            <div class="col-12 col-md-4 radio d-flex justify-content-center">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 d-flex time p-0">
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="10">10:00 AM</option>
                                    <option value="10_30">10:30 AM</option>
                                </select>
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="AL">10:00 AM</option>
                                    <option value="WY">10:30 AM</option>
                                </select>
                            </div>
                        </div>
                    </li>

                    <li class="d-flex justify-content-between align-items-center">
                        <div class="row no-gutters pt-width-p-100">
                            <div class="col-12 col-md-4 text">
                                Friday
                            </div>
                            <div class="col-12 col-md-4 radio d-flex justify-content-center">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 d-flex time p-0">
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="10">10:00 AM</option>
                                    <option value="10_30">10:30 AM</option>
                                </select>
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="AL">10:00 AM</option>
                                    <option value="WY">10:30 AM</option>
                                </select>
                            </div>
                        </div>
                    </li>

                    <li class="d-flex justify-content-between align-items-center">
                        <div class="row no-gutters pt-width-p-100">
                            <div class="col-12 col-md-4 text">
                                Saturday
                            </div>
                            <div class="col-12 col-md-4 radio d-flex justify-content-center">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 d-flex time p-0">
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="10">10:00 AM</option>
                                    <option value="10_30">10:30 AM</option>
                                </select>
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="AL">10:00 AM</option>
                                    <option value="WY">10:30 AM</option>
                                </select>
                            </div>
                        </div>
                    </li>

                    <li class="d-flex justify-content-between align-items-center">
                        <div class="row no-gutters pt-width-p-100">
                            <div class="col-12 col-md-4 text">
                                Sunday
                            </div>
                            <div class="col-12 col-md-4 radio d-flex justify-content-center">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-0" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 d-flex time p-0">
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="10">10:00 AM</option>
                                    <option value="10_30">10:30 AM</option>
                                </select>
                                <select class="select2 select2-hidden-accessible" name="10:00 AM">
                                    <option value="AL">10:00 AM</option>
                                    <option value="WY">10:30 AM</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <div class="row mt-4">
                        <div class="col-12 col-md-8">
                        </div>
                        <div class="col-12 col-md-4">
                            <button class="btn text-decoration-none common-btn " data-bs-toggle="modal" data-bs-target="#newplan">
                                Save Availability
                            </button>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div> -->
    
    
    <div class="availability-main email-template student-list box-main bg-white mt-4 p-3">
        <div id="calendar_loader">
            {{-- <i class="fas fa-stroopwafel fa-spin"></i>  --}}
            <i class="fas fa-spinner fa-pulse"></i>
            Preparing Calendar..
        </div>
        <div id="calendar"></div>
    </div>
</div>
@endsection

@section('js-hooks')
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script>
    
    
        
        document.addEventListener('DOMContentLoaded', function() {
            
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {

                initialDate: new Date(),
                initialView: 'timeGridWeek',
                nowIndicator: true,
                customButtons: {
                    btnCopyEvents: {
                        text: 'Copy last week availability'
                    }
                },
                headerToolbar: {
                    left: 'prev,next today,btnCopyEvents',
                    center: 'title',
                    right: 'timeGridWeek'
                },
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                selectMirror: true,
                allDaySlot: false,
                dayMaxEvents: true, // allow "more" link when too many events
                events:{
                    url: "{{ route('getTutorSlot') }}"
                },
                eventResize: function (resize_slot_obj) {
                   /*  swal({
                            text: "You'd like to change slot note?",
                            buttons: true,
                            dangerMode: true,
                            content: {
                                element: "input",
                                attributes: {
                                placeholder: "Type your note here",
                                type: "text",
                                },
                            }
                        })
                    .then((slot_note) => {
                        
                        if (slot_note) {
                            create_slot(resize_slot_obj.event,slot_note) 
                        }
                        else 
                        { */
                            create_slot(resize_slot_obj.event,resize_slot_obj.event.title ) 
                      /*   }
                    }); */
                },
                eventDrop: function (event) {
                    alert("Drop event");
                },
                eventClick: function (delete_slot_obj) {
                    // console.log("hi");
                 /*    
                    swal({
                            text: "You'd like to delete the time slot?",
                            buttons: true,
                            dangerMode: true,
                        })
                    .then((yes_delete) => {
                        
                        if (yes_delete) { */
                            create_slot(delete_slot_obj.event,"")
                       /*  } 
                    }); */
                   
                },
                select: function (create_slot_obj) {
                   /*  swal({
                            text: "Write note here!",
                            buttons: true,
                            dangerMode: true,
                            content: {
                                element: "input",
                                attributes: {
                                placeholder: "Type your note here",
                                type: "text",
                                },
                            },
                        })
                    .then((slot_note) => {
                        
                        if (slot_note) { */
                            // $("#calendar_loader").css('display','block'); //Loader
                            create_slot(create_slot_obj,"")
                    //     } 
                    // });
                },
                eventDidMount: function(info) {
                    //   console.log(info);
                    
                },
                viewDidMount: function (viewInfo) {
                    var datePicker = document.getElementById('btnCopySpan');
                    if (datePicker == null) {
                        $('.fc-btnCopyEvents-button').on('click', function () {
                            var activeStartDate=JSON.stringify(viewInfo.view.activeStart);
                            var activeEndDate=JSON.stringify(viewInfo.view.activeEnd);
                            $.ajax({
                                url: '{{ route("copyForNextWeek") }}',
                                type: 'post',
                                data: {activeStartDate:activeStartDate,activeEndDate:activeEndDate,_token:"{{ csrf_token() }}"},
                                success: function (response) {
                                    console.log(response);
                                    calendar.refetchEvents();
                                    swal("Slots copied successfully.");
                                }
                            });
                        });
                    }
                }
            });
            
            calendar.render();

            function create_slot(calendarEvent,slot_note) {
                if(calendarEvent.allDay)
                {
                    var slot_date=calendarEvent.startStr.split('T')[0];
                    var slot_start_time="00:00:00";
                    var slot_end_time="00:00:00";
                }
                else
                {
                    var slot_date=calendarEvent.startStr.split('T')[0];
                    var slot_start_time=calendarEvent.startStr.split("T")[1].split("+")[0];
                    var slot_end_time=calendarEvent.endStr.split("T")[1].split("+")[0];
                }
               
                $.ajax({
                    url:"{{ route('storeTutorSlot') }}",
                    type:"post",
                    data:{slot_note:" ",slot_start_time:slot_start_time,slot_date:slot_date,slot_end_time:slot_end_time,_token:"{{ csrf_token() }}"},
                    success:function(response){
                        // $("#calendar_loader").css('display','none'); //Loader
                        calendar.refetchEvents();
                    }
                });
            }
    });
	</script>
@endsection
