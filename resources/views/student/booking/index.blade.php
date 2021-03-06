@extends('layouts.studentApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-view-dashboard-outline" aria-hidden="true"></i>
            <span class="ps-1">Booking List</span>
        </label>
        <div class="d-flex align-items-center">
            <input type="text" class="form-control" id="stu_list_daterange" />
            <span class="page-title col-md-5" style="margin-left:10px; ">
                <i class="mdi mdi-calendar-clock" aria-hidden="true" title="total meeting hours"></i>
                {{ $totalRemainingMinutes }} Min
            </span>
        </div>
    </div>
    <!-- <div class="card-tools">
        <a class="btn btn-success" href="{{route('booking.index')}}"><i class="fas fa-plus"></i> &nbsp; Booking Slot</a>
    </div> -->
    <div class="student-list bg-white mt-4">
        <table id="student_list" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Tutor Name</th>
                    <th>Date Time</th>
                    <th>Specialization</th>
                    <th>Status</th>
                    <th>Google Meet Link</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($bookingslots as $bookingslot)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{isset($bookingslot->tutor->first_name) ? $bookingslot->tutor->first_name : ''}} {{isset($bookingslot->tutor->last_name) ? $bookingslot->tutor->last_name : ''}}</td>
                        <td>{{$bookingslot->date_time}}</td>
                        <td>{{$bookingslot->specialization->name}}</td>
                        <td> 
                            @if($bookingslot->date_time >= Carbon\Carbon::now())
                                @if ($bookingslot->meeting_status)
                                    <span class="badge bg-success">Done</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            @else
                                <span class="badge bg-danger">Expired</span>
                            @endif
                        </td>
                        <td><a href="{{$bookingslot->google_link}}" target="_blank">{{$bookingslot->google_link}}</a></td>
                        <!-- <td>
                            <a href="{{ route('sbooking.edit',$bookingslot->id) }}" title="edit" ><i class="fas fa-pen"></i></a>
                            <a href="{{ route('sbooking.destroy',$bookingslot->id) }}" ><i class="fas fa-trash"></i></a>
                        </td> -->

                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
@endsection