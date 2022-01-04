@extends('layouts.studentApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-cash" aria-hidden="true"></i>
            <span class="ps-1">Plan Info</span>
        </label>
        <div class="d-flex align-items-center">
            <button class="btn text-decoration-none common-btn ms-2" data-bs-toggle="modal" data-bs-target="#newplan">
                Upgrade Plan
            </button>
        </div>
    </div>
    <div class="student-list bg-white mt-4">
        <table id="student_list" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Plan Name</th>
                    <th>Monthly Amount</th>
                    <th>Minutes</th>
                    <th>Left Minutes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Basic</td>
                    <td>$44.99</td>
                    <td>90 Min</td>
                    <td>60 Min</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection