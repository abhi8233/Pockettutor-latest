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
            height: 76px;
        }
        tr:first-child>td>.fc-day-grid-event
        {    
            margin-top: -24px;
            line-height: 118px;
            background: #ffa2a287;
            color: black;
            width: 93px;
            margin-left: 0px;

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
                                    <span class="btn btn-danger btn-xs mr-2" onclick="reset_input_val()">x Reset</span>
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
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="language-booking d-flex" id="BookingSlotBody">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Not Now</button>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="displaySlotTime">Save Now</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            {{-- Model Close--}}
                          {{--   <div id="ct" class="ct-md-12 ct-sm-12 ct-xs-12 ct-datetime-select-main">

                                <div class="ct-datetime-select">

                                    <div class="calendar-wrapper cal_info">

                                        <div class="calendar-header">
                                        
                                            <a class="previous-date" href="javascript:void(0)"><i class="fas fa-angle-left"></i></a>
                                            <div class="calendar-title">JANUARY</div>
                                            <div class="calendar-year">2022</div>
                                        
                                            <a data-istoday="N" class="next-date previous_next" href="javascript:void(0)" data-next_month="02" data-next_month_year="2022"><i class="fas fa-angle-right"></i></a>
                                        </div>
                                        <div class="calendar-body">
                                            <div class="weekdays fl">
                                                <div class="ct-day">
                                                    <span>Mon</span>
                                                </div>
                                                <div class="ct-day">
                                                    <span>Tue</span>
                                                </div>
                                                <div class="ct-day">
                                                    <span>Wed</span>
                                                </div>
                                                <div class="ct-day">
                                                    <span>Thu</span>
                                                </div>
                                                <div class="ct-day">
                                                    <span>Fri</span>
                                                </div>
                                                <div class="ct-day">
                                                    <span>Sat</span>
                                                </div>
                                                <div class="ct-day ct-last-day">
                                                    <span>Sun</span>
                                                </div>
                                            </div>
                                            <div class="dates">
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="7" data-selected_dates="1-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1640991600"><a href="javascript:void(0)"><span>1</span></a></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="7" data-selected_dates="2-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641078000"><a href="javascript:void(0)"><span>2</span></a></div>
                                            </div>
                                            <div class="ct-show-time time_slot_box display_selected_date_slots_box7 shown" style="/* display: none; */"></div>
                                            <div class="dates">
                                                <div title="" class="ct-week  hide_previous_dates" data-id="14" data-selected_dates="3-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641164400"><a href="javascript:void(0)"><span>3</span></a></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="14" data-selected_dates="4-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641250800"><a href="javascript:void(0)"><span>4</span></a></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="14" data-selected_dates="5-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641337200"><a href="javascript:void(0)"><span>5</span></a></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="14" data-selected_dates="6-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641423600"><a href="javascript:void(0)"><span>6</span></a></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="14" data-selected_dates="7-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641510000"><a href="javascript:void(0)"><span>7</span></a></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="14" data-selected_dates="8-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641596400"><a href="javascript:void(0)"><span>8</span></a></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="14" data-selected_dates="9-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641682800"><a href="javascript:void(0)"><span>9</span></a></div>
                                            </div>
                                            <div class="ct-show-time time_slot_box display_selected_date_slots_box14 shown" style="/* display: none; */"></div>
                                            <div class="dates">
                                                <div title="" class="ct-week  hide_previous_dates" data-id="21" data-selected_dates="10-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641769200"><a href="javascript:void(0)"><span>10</span></a></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="21" data-selected_dates="11-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641855600"><a href="javascript:void(0)"><span>11</span></a></div>
                                                <div title="" class="ct-week  hide_previous_dates" data-id="21" data-selected_dates="12-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1641942000"><a href="javascript:void(0)"><span>12</span></a></div>
                                                <div class="ct-tooltipss-load ct-week by_default_today_selected selected_datess13-01-2022 remove_selection selected_date tooltipstered active_today" data-id="21" data-selected_dates="13-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642028400"><a href="javascript:void(0)"><span>13</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess14-01-2022 remove_selection selected_date tooltipstered active" data-id="21" data-selected_dates="14-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642114800"><a href="javascript:void(0)"><span>14</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess15-01-2022 remove_selection selected_date tooltipstered" data-id="21" data-selected_dates="15-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642201200"><a href="javascript:void(0)"><span>15</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess16-01-2022 remove_selection selected_date tooltipstered" data-id="21" data-selected_dates="16-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642287600"><a href="javascript:void(0)"><span>16</span></a></div>
                                            </div>
                                            <div class="ct-show-time time_slot_box display_selected_date_slots_box21 shown" style="display: block;">
                                                <div class="time-slot-container">
                                                    <ul class="list-inline time-slot-ul br-5">

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="10:00 AM" data-slotdb_time="10:00" data-slotdb_date="2022-01-14" data-ct_time_selected="10:00AM">
                                                            10:00 AM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="10:30 AM" data-slotdb_time="10:30" data-slotdb_date="2022-01-14" data-ct_time_selected="10:30AM">
                                                            10:30 AM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="11:00 AM" data-slotdb_time="11:00" data-slotdb_date="2022-01-14" data-ct_time_selected="11:00AM">
                                                            11:00 AM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="11:30 AM" data-slotdb_time="11:30" data-slotdb_date="2022-01-14" data-ct_time_selected="11:30AM">
                                                            11:30 AM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="12:00 PM" data-slotdb_time="12:00" data-slotdb_date="2022-01-14" data-ct_time_selected="12:00PM">
                                                            12:00 PM </li>

                                                        <li class="time-slot br-2 time_slotss ct-booked" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="12:30 PM" data-slotdb_time="12:30" data-slotdb_date="2022-01-14" data-ct_time_selected="12:30PM">
                                                            12:30 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="01:00 PM" data-slotdb_time="13:00" data-slotdb_date="2022-01-14" data-ct_time_selected="01:00PM">
                                                            01:00 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="01:30 PM" data-slotdb_time="13:30" data-slotdb_date="2022-01-14" data-ct_time_selected="01:30PM">
                                                            01:30 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="02:00 PM" data-slotdb_time="14:00" data-slotdb_date="2022-01-14" data-ct_time_selected="02:00PM">
                                                            02:00 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="02:30 PM" data-slotdb_time="14:30" data-slotdb_date="2022-01-14" data-ct_time_selected="02:30PM">
                                                            02:30 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="03:00 PM" data-slotdb_time="15:00" data-slotdb_date="2022-01-14" data-ct_time_selected="03:00PM">
                                                            03:00 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="03:30 PM" data-slotdb_time="15:30" data-slotdb_date="2022-01-14" data-ct_time_selected="03:30PM">
                                                            03:30 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="04:00 PM" data-slotdb_time="16:00" data-slotdb_date="2022-01-14" data-ct_time_selected="04:00PM">
                                                            04:00 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="04:30 PM" data-slotdb_time="16:30" data-slotdb_date="2022-01-14" data-ct_time_selected="04:30PM">
                                                            04:30 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="05:00 PM" data-slotdb_time="17:00" data-slotdb_date="2022-01-14" data-ct_time_selected="05:00PM">
                                                            05:00 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="05:30 PM" data-slotdb_time="17:30" data-slotdb_date="2022-01-14" data-ct_time_selected="05:30PM">
                                                            05:30 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="06:00 PM" data-slotdb_time="18:00" data-slotdb_date="2022-01-14" data-ct_time_selected="06:00PM">
                                                            06:00 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="06:30 PM" data-slotdb_time="18:30" data-slotdb_date="2022-01-14" data-ct_time_selected="06:30PM">
                                                            06:30 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="07:00 PM" data-slotdb_time="19:00" data-slotdb_date="2022-01-14" data-ct_time_selected="07:00PM">
                                                            07:00 PM </li>

                                                        <li class="time-slot br-2 time_slotss" data-slot_date_to_display="14-Jan-2022" data-ct_date_selected="Fri, 14 January, 2022" data-slot_date="14-01-2022" data-slot_time="07:30 PM" data-slotdb_time="19:30" data-slotdb_date="2022-01-14" data-ct_time_selected="07:30PM">
                                                            07:30 PM </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="dates">
                                                <div class="ct-tooltipss-load ct-week  selected_datess17-01-2022 remove_selection selected_date tooltipstered" data-id="28" data-selected_dates="17-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642374000"><a href="javascript:void(0)"><span>17</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess18-01-2022 remove_selection selected_date tooltipstered" data-id="28" data-selected_dates="18-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642460400"><a href="javascript:void(0)"><span>18</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess19-01-2022 remove_selection selected_date tooltipstered" data-id="28" data-selected_dates="19-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642546800"><a href="javascript:void(0)"><span>19</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess20-01-2022 remove_selection selected_date tooltipstered" data-id="28" data-selected_dates="20-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642633200"><a href="javascript:void(0)"><span>20</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess21-01-2022 remove_selection selected_date tooltipstered" data-id="28" data-selected_dates="21-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642719600"><a href="javascript:void(0)"><span>21</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess22-01-2022 remove_selection selected_date tooltipstered" data-id="28" data-selected_dates="22-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642806000"><a href="javascript:void(0)"><span>22</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess23-01-2022 remove_selection selected_date tooltipstered" data-id="28" data-selected_dates="23-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642892400"><a href="javascript:void(0)"><span>23</span></a></div>
                                            </div>
                                            <div class="ct-show-time time_slot_box display_selected_date_slots_box28 shown" style="display: none;"></div>
                                            <div class="dates">
                                                <div class="ct-tooltipss-load ct-week  selected_datess24-01-2022 remove_selection selected_date tooltipstered" data-id="35" data-selected_dates="24-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1642978800"><a href="javascript:void(0)"><span>24</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess25-01-2022 remove_selection selected_date tooltipstered" data-id="35" data-selected_dates="25-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1643065200"><a href="javascript:void(0)"><span>25</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess26-01-2022 remove_selection selected_date tooltipstered" data-id="35" data-selected_dates="26-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1643151600"><a href="javascript:void(0)"><span>26</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess27-01-2022 remove_selection selected_date tooltipstered" data-id="35" data-selected_dates="27-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1643238000"><a href="javascript:void(0)"><span>27</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess28-01-2022 remove_selection selected_date tooltipstered" data-id="35" data-selected_dates="28-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1643324400"><a href="javascript:void(0)"><span>28</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess29-01-2022 remove_selection selected_date tooltipstered" data-id="35" data-selected_dates="29-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1643410800"><a href="javascript:void(0)"><span>29</span></a></div>
                                                <div class="ct-tooltipss-load ct-week  selected_datess30-01-2022 remove_selection selected_date tooltipstered" data-id="35" data-selected_dates="30-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1643497200"><a href="javascript:void(0)"><span>30</span></a></div>
                                            </div>
                                            <div class="ct-show-time time_slot_box display_selected_date_slots_box35 shown" style="display: none;"></div>
                                            <div class="dates">
                                                <div class="ct-tooltipss-load ct-week  selected_datess31-01-2022 remove_selection selected_date tooltipstered" data-id="42" data-selected_dates="31-01-2022" data-cur_dates="13-01-2022" data-c_date="1642028400" data-s_date="1643583600"><a href="javascript:void(0)"><span>31</span></a></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                                <div class="ct-week hide_previous_dates"></div>
                                            </div>
                                            <div class="ct-show-time time_slot_box display_selected_date_slots_box42 shown" style="display: none;"></div>
                                            <div class="today-date">
                                                <a class="ct-button nm today_btttn ct-lg-offset-1" data-istoday="Y" data-cur_dates="13-01-2022" data-next_month="01" data-next_month_year="2022">TODAY</a>
                                                <div class="ct-selected-date-view ct-lg-pull-1 pulse"><span class="add_date ct-date-selected" data-date="21-01-2022">Fri, 21 January, 2022</span><span class="add_time ct-time-selected">01:30PM</span></div>
                                                <input type="hidden" id="save_selected_date" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end calendar-wrapper -->

                                </div>

                            </div> --}}
                        </div>
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
                    </div>
                    
                    <div class="col-12 mb-2">
                        <label class="col-form-label">Rating</label>
                        <!-- <div class="">
                            <select class="select2 front-rating" name="rating" id="rating">
                                <option value=""> Select Rating</option>
                                <option value="0.5">0.5</option>
                                <option value="1.0">1.0</option>
                                <option value="1.5">1.5</option>
                                <option value="2.0">2.0</option>
                                <option value="2.5">2.5</option>
                                <option value="3.0">3.0</option>
                                <option value="3.5">3.5</option>
                                <option value="4.0">4.0</option>
                                <option value="4.5">4.5</option>
                                <option value="5.0">5.0</option>
                            </select>
                        </div> -->
                        <div class="number">
                            <span class="minus">-</span>
                            <input type="text" value="0" id="rating"  readonly />
                            <span class="plus">+</span>
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

    $("#specialization").change(function(){
        // alert("hii");
        
        if ($(this).val() != null) {
            $.ajax({
                type: "GET",
                url: "{{route('getTutor')}}",
                data: {
                    // 'language_id': $(this).val(),
                    'specialization_id': $('#specialization').val(),
                    // 'rating': $('#rating').val()
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
            /* if ($(this).val() != null) {
                $.ajax({
                    type: "GET",
                    url: "{{route('getTutorSlot')}}",
                    data: {
                        'specialization_id': $(this).val(),
                        'start': "2021-12-26",
                        'end': "2022-02-06"
                    },
                    beforeSend: function(){
                        // $('#tutor_html_id').html('Loading...');
                    },
                    success: function(data) {
                        // $("#tutor_html_id").html(data);
                        $("#calendar").fullCalendar()
                    }
                });
            } */
    });

    var slot_time;
    $("#displaySlotTime").click(function () {
        $("#selected_date_times").html("");
        var datetimes = '';
        $("input[name='slotList']:checked").each(function (index, obj) {
            slot_time = ($(this).val() > "12:00:00") ? "PM" : "AM";
            $("#selected_date_times").append(`${$(this).val()} -${slot_time}`);
            datetimes = $(this).val();
            // alert(datetimes);
        });
        // alert(slot_time); 
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

    $('#rating').change(function(){
        if ($(this).val() != null) {
            $.ajax({
                type: "GET",
                url: "{{route('getTutor')}}",
                data: {
                    'specialization_id': $('#specialization').val(),
                    'date' : $('#selected_date').html(),
                    'time' : $('#selected_date_times').html(),
                    'language_id': $('.language').val(),
                    'rating': $(this).val()
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
        /*  events:{
                url: "{{ route('getTutorSlot') }}?specialization_id="+$('#specialization').val(),
            }, */
        events:[
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
        ],
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
                        // console.log(response);
                        // calendar.refetchEvents();
                        // swal("Slots copied successfully.");
                    }
                });
            // console.log(activeStartDate);
         
        },

        eventRender: function(event, element) {
            console.log("B-------",event,element);
        },

        eventClick: function(calEvent, calEvent) {
            console.log("C-------",calEvent,calEvent);
        }
    });

});

</script>
<script type="text/javascript">
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

       

        // $(document).on('change', '#specialization', function() {
        //     if ($(this).val() != null) {
        //         $.ajax({
        //             type: "GET",
        //             url: "{{route('getTutor')}}",
        //             data: {
        //                 'language_id': $(this).val(),
        //                 'specialization_id': $('#specialization').val(),
        //                 'rating': $('#rating').val()
        //             },
        //             beforeSend: function(){
        //                 $('#tutor_html_id').html('Loading...');
        //             },
        //             success: function(data) {
        //                 $("#tutor_html_id").html(data);
        //             }
        //         });
        //     }
        // });

        // $(document).on('change', '.language', function() {
        //     if ($(this).val() != null) {
        //         $.ajax({
        //             type: "GET",
        //             url: "{{route('getTutor')}}",
        //             data: {
        //                 'language_id': $(this).val(),
        //                 'specialization_id': $('#specialization').val(),
        //                 'rating': $('#rating').val()
        //             },
        //             beforeSend: function(){
        //                 $('#tutor_html_id').html('Loading...');
        //             },
        //             success: function(data) {
        //                 $("#tutor_html_id").html(data);
        //             }
        //         });
        //     }
        // });

        // $(document).on('change', '#rating', function() {
        //     if ($(this).val() != null) {
        //         $.ajax({
        //             type: "GET",
        //             url: "{{route('getTutor')}}",
        //             data: {
        //                 'rating': $(this).val(),
        //                 'language_id': $('#language').val(),
        //                 'specialization_id': $('#specialization').val()
        //             },
        //             beforeSend: function(){
        //                 $('#tutor_html_id').html('Loading...');
        //             },
        //             success: function(data) {
        //                 $("#tutor_html_id").html(data);
        //             }
        //         });
        //     }
        // });

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
                    success: function(data) {
                        // console.log(data);
                        // alert(data.status);
                        if (data.status == 200) {
                            $(".date-time").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Booking booked successfully.</div>');
                            setTimeout(function() {
                                window.location = "{{ route('sbooking.index') }}";
                            }, 1000);
                        } else if (data.status == 500) {
                            $(".date-time").after('<div class="alert alert-warning alert-dismissible" id="myAlert"><strong>Google Meet!</strong> Creadentials not found.</div>');
                        } else {
                            // alert("Opps..! Something Went to Wrong.")
                            $(".date-time").after('<div class="alert alert-danger alert-dismissible" id="myAlert"><strong>Opps..!</strong> Something Went to Wrong.</div>');
                        }
                    }
                });
                return false;
            }
        });
    
    });

    function reset_input_val()
    {
        $("input[name='slotList']:checked").attr('checked','false');
        $("#selected_date_times").html("un-selected");
        $("#selected_date").html("un-selected");
    }
</script>
@endsection