@extends('layouts.adminApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Student List</span>    
        </label>
        <div class="date-filter">
            <input type="text" class="form-control" id="stu_list_daterange" />
        </div>
    </div>
    <div class="student-list bg-white mt-4">
        <table id="student_list" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Full Name</th>
                    <th>Email Id</th>
                    <th>Plan Name</th>
                    <th>Plan Amount</th>
                    <th>Minutes</th>
                    <th>15 min slot</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90</td>
                    <td>6</td>
                    <td>15-12-2021</td>
                    <td>15-12-2021</td>
                    <td><button class="btn pt-btn-blue px-2 py-0"><i class="mdi mdi-email-send-outline"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90</td>
                    <td>6</td>
                    <td>15-12-2021</td>
                    <td>15-12-2021</td>
                    <td><button class="btn pt-btn-blue px-2 py-0"><i class="mdi mdi-email-send-outline"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90</td>
                    <td>6</td>
                    <td>15-12-2021</td>
                    <td>15-12-2021</td>
                    <td><button class="btn pt-btn-blue px-2 py-0"><i class="mdi mdi-email-send-outline"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90</td>
                    <td>6</td>
                    <td>15-12-2021</td>
                    <td>15-12-2021</td>
                    <td><button class="btn pt-btn-blue px-2 py-0"><i class="mdi mdi-email-send-outline"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90</td>
                    <td>6</td>
                    <td>15-12-2021</td>
                    <td>15-12-2021</td>
                    <td><button class="btn pt-btn-blue px-2 py-0"><i class="mdi mdi-email-send-outline"></i></td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
@endsection