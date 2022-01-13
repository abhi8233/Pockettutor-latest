@extends('layouts.bookingApp')

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
                        <label class="col-md-4 col-form-label">Select Date & Time</label>
                        <div class="row">
                            <!-- <div class="col-12 col-md-6">
                                <input type="date" id="date" name="date" placeholder="Select Date" class="">
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="time" id="time" name="time" placeholder="Select Time" class="">
                            </div> -->

                            <div id="ct" class="ct-md-12 ct-sm-12 ct-xs-12 ct-datetime-select-main">

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

                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="col-md-4 col-form-label">Select Language</label>
                        <div class="language-booking d-flex">
                            <!-- <select class="" name="language" id="language">
                                <option value=""> Select Language</option>
                                @foreach($languages as $language)
                                <option value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach
                            </select> -->
                            <label>
                                <input type="checkbox">
                                <span>
                                    English
                                </span>
                            </label>

                            <label>
                                <input type="checkbox" checked>
                                <span>
                                    Spanish
                                </span>
                            </label>

                            <label>
                                <input type="checkbox">
                                <span>
                                    Korean
                                </span>
                            </label>

                            <label>
                                <input type="checkbox" checked>
                                <span>
                                    Japanese
                                </span>
                            </label>

                            <label>
                                <input type="checkbox">
                                <span>
                                    Hindi
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="col-md-4 col-form-label">Rating</label>
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
                            <input type="text" value="1+" />
                            <span class="plus">+</span>
                        </div>
                    </div>

                    <div class="col-12 mb-2 tutor-main">
                        <label class="col-md-4 col-form-label">Select Tutor</label>
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
            }
        });

        $(document).on('change', '#specialization', function() {
            if ($(this).val() != null) {
                $.ajax({
                    type: "GET",
                    url: "{{route('getTutor')}}",
                    data: {
                        'specialization_id': $(this).val(),
                        'language_id': $('#language').val(),
                        'rating': $('#rating').val()
                    },
                    beforeSend: function(){
                        $('#tutor_html_id').html('Loading...');
                    },
                    success: function(data) {
                        $("#tutor_html_id").html(data);
                    }
                });
            }
        });

        $(document).on('change', '#language', function() {
            if ($(this).val() != null) {
                $.ajax({
                    type: "GET",
                    url: "{{route('getTutor')}}",
                    data: {
                        'language_id': $(this).val(),
                        'specialization_id': $('#specialization').val(),
                        'rating': $('#rating').val()
                    },
                    beforeSend: function(){
                        $('#tutor_html_id').html('Loading...');
                    },
                    success: function(data) {
                        $("#tutor_html_id").html(data);
                    }
                });
            }
        });

        $(document).on('change', '#rating', function() {
            if ($(this).val() != null) {
                $.ajax({
                    type: "GET",
                    url: "{{route('getTutor')}}",
                    data: {
                        'rating': $(this).val(),
                        'language_id': $('#language').val(),
                        'specialization_id': $('#specialization').val()
                    },
                    beforeSend: function(){
                        $('#tutor_html_id').html('Loading...');
                    },
                    success: function(data) {
                        $("#tutor_html_id").html(data);
                    }
                });
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
            submitHandler: function(form) {
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
</script>
@endsection