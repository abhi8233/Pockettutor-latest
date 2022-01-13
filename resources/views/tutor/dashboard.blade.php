@extends('layouts.tutorApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-view-dashboard-outline" aria-hidden="true"></i>
            <span class="ps-1">Dashboard</span>
        </label>
        <!-- <div class="date-filter">
            <input type="text" class="form-control" id="stu_list_daterange" />
        </div> -->
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
        <div id="calendar"></div>
    </div>
</div>
@endsection

@section('js-hooks')
<script>
		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');

			var calendar = new FullCalendar.Calendar(calendarEl, {
				initialDate: '2020-09-12',
				initialView: 'timeGridWeek',
				nowIndicator: true,
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'timeGridWeek'
				},
				navLinks: true, // can click day/week names to navigate views
				editable: true,
				selectable: true,
				selectMirror: true,
				dayMaxEvents: true, // allow "more" link when too many events
				events: [
					{
						groupId: 999,
						title: 'Repeating Event',
						start: '2020-09-09T16:00:00'
					},
					{
						groupId: 999,
						title: 'Repeating Event',
						start: '2020-09-09T12:00:00'
					},
					{
						groupId: 999,
						title: 'Repeating Event',
						start: '2020-09-08T13:30:00'
					},
					{
						groupId: 999,
						title: 'Repeating Event',
						start: '2020-09-06T01:30:00'
					},
					{
						groupId: 999,
						title: 'Repeating Event',
						start: '2020-09-07T03:30:00'
					},
				]
			});

			calendar.render();
		});
	</script>
@endsection