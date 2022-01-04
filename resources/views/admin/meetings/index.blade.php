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
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>Lorem</td>
                    <td>15-12-2021 12:30 PM </td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>Lorem</td>
                    <td>15-12-2021 12:30 PM </td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>Lorem</td>
                    <td>15-12-2021 12:30 PM </td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>Lorem</td>
                    <td>15-12-2021 12:30 PM </td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>Lorem</td>
                    <td>15-12-2021 12:30 PM </td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Lorem</td>
                    <td>Lorem</td>
                    <td>15-12-2021 12:30 PM </td>
                    <td>Pending</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection