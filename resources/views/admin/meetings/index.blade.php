@extends('layouts.adminApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-multiple-outline" aria-hidden="true"></i>
            <span class="ps-1">Meetings</span>
        </label>
        <div class="date-filter">
            <input type="text" class="form-control" id="stu_list_daterange" />
        </div>
    </div>
    <div class="student-list bg-white p-3 mt-4">
        <table id="student_list" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Tutor Name</th>
                    <th>Student Name</th>
                    <th>Meeting Date & Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{isset($booking->tutor->first_name) ? $booking->tutor->first_name : ''}} {{isset($booking->tutor->last_name) ? $booking->tutor->last_name: ''}}</td>

                    <td>{{isset($booking->user->first_name) ? $booking->user->first_name : ''}} {{isset($booking->user->last_name) ? $booking->user->last_name: ''}}</td>
                    <td>{{ $booking->date_time }} </td>
                    <td> 
                        @if($booking->date_time >= Carbon\Carbon::now())
                            @if ($booking->meeting_status)
                                <span class="badge bg-success">Done</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        @else
                            <span class="badge bg-danger">Expired</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection