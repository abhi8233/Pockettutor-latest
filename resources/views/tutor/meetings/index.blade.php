@extends('layouts.tutorApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-multiple-outline" aria-hidden="true"></i>
            <span class="ps-1">Meetings</span>
        </label>
        <div class="d-flex align-items-center">
            <input type="text" class="form-control" id="stu_list_daterange" />
        </div>
    </div>
    <div class="student-list bg-white mt-4">
        <table id="student_list" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Student Name</th>
                    <th>Booking</th>
                    <th>Meeting Link</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->id}}</td>
                    <td>{{$booking->user->first_name}} {{$booking->user->last_name}}</td>
                    <td>{{$booking->date_time}}</td>
                    <td>{{$booking->date_google_link}}</td>
                    <td>@if($booking->date_time >= Carbon\Carbon::now())
                        Pending
                        @else
                        Expired
                        @endif</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
