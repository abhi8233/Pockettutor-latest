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
                    <th colspan="2" class="text-center">Link & Meeting Status</th>
                    {{-- <th>Meeting Status</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                
                <tr>
                    <td>{{$booking->id}}</td>
                    <td> {{ (isset($booking->user->first_name)) ? $booking->user->first_name : '' }}
                        {{ (isset($booking->user->last_name)) ? $booking->user->last_name : '' }} </td>
                    <td>{{$booking->date_time}}</td>
                    <td><a href="{{$booking->google_link}}" target="_blank">{{$booking->google_link}}</a></td>
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
                    <td id="meeting_status_{{ $booking->id }}">
                        {{-- {{ $booking->is_feedback }} --}}
                        @if ($booking->meeting_status)
                            <span class='text-success'>Completed Meeting</span>
                        @else
                            @if($booking->date_time >= Carbon\Carbon::now())
                                <a name="" id="" class="btn btn-success btn-sm" href="#" role="button" onclick="meeting_status_change({{ $booking->id }})">Complete Meeting</a>    
                            @else
                                <span class="text-danger">Not Attended</span>
                            @endif
                        @endif
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js-hooks')
    <script>
        function meeting_status_change(booking_id)
        {
            
            $.ajax({
                url: '{{ route("changeMettingBookStatus") }}',
                type: "post",
                data : {
                    booking_id:booking_id,
                    _token: '{{csrf_token()}}'
                },
                success: function(data){
                    $("#meeting_status_"+booking_id).html("<span class='text-success'>Completed Meeting</span>");
                }
            });
        }
    </script>
@endsection