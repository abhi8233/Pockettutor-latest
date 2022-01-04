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
        </div>
    </div>
    <div class="student-list bg-white mt-4">
        <table id="student_list" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Tutor Name</th>
                    <th>Booking Date & Time</th>
                    <th>Meeting Link</th>
                    <th>Meeting minutes</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>15-12-2021 11:30 AM</td>
                    <td>www.abcmeeting.com/Lorem</td>
                    <td>20min</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>15-12-2021 11:30 AM</td>
                    <td>www.abcmeeting.com/Lorem</td>
                    <td>20min</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>15-12-2021 11:30 AM</td>
                    <td>www.abcmeeting.com/Lorem</td>
                    <td>20min</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>15-12-2021 11:30 AM</td>
                    <td>www.abcmeeting.com/Lorem</td>
                    <td>20min</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>15-12-2021 11:30 AM</td>
                    <td>www.abcmeeting.com/Lorem</td>
                    <td>20min</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>15-12-2021 11:30 AM</td>
                    <td>www.abcmeeting.com/Lorem</td>
                    <td>20min</td>
                    <td>Pending</td>    
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection