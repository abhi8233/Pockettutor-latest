@extends('layouts.adminApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Tutor List</span>    
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
                    <th>Language</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Field Of Interest</th>
                    <th>Hourly Rate</th>
                    <th>Spent Hours</th>
                    <th>Month Name</th>
                    <th>Passport Number</th>
                    <th>Document</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>English</td>
                    <td>USA</td>
                    <td>Texas</td>
                    <td>Accounts maths tax</td>
                    <td>$15</td>
                    <td>4Hrs</td>
                    <td>January</td>
                    <td>123456789</td>
                    <td><img src="../assets/images/icons/pdf-icon.svg"></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>English</td>
                    <td>USA</td>
                    <td>Texas</td>
                    <td>Accounts maths tax</td>
                    <td>$15</td>
                    <td>4Hrs</td>
                    <td>January</td>
                    <td>123456789</td>
                    <td><img src="../assets/images/icons/pdf-icon.svg"></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>English</td>
                    <td>USA</td>
                    <td>Texas</td>
                    <td>Accounts maths tax</td>
                    <td>$15</td>
                    <td>4Hrs</td>
                    <td>January</td>
                    <td>123456789</td>
                    <td><img src="../assets/images/icons/pdf-icon.svg"></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>English</td>
                    <td>USA</td>
                    <td>Texas</td>
                    <td>Accounts maths tax</td>
                    <td>$15</td>
                    <td>4Hrs</td>
                    <td>January</td>
                    <td>123456789</td>
                    <td><img src="../assets/images/icons/pdf-icon.svg"></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>English</td>
                    <td>USA</td>
                    <td>Texas</td>
                    <td>Accounts maths tax</td>
                    <td>$15</td>
                    <td>4Hrs</td>
                    <td>January</td>
                    <td>123456789</td>
                    <td><img src="../assets/images/icons/pdf-icon.svg"></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Marteen</td>
                    <td>demo@gmail.com</td>
                    <td>English</td>
                    <td>USA</td>
                    <td>Texas</td>
                    <td>Accounts maths tax</td>
                    <td>$15</td>
                    <td>4Hrs</td>
                    <td>January</td>
                    <td>123456789</td>
                    <td><img src="../assets/images/icons/pdf-icon.svg"></td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
@endsection