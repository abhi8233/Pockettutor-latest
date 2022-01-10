@extends('layouts.studentApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Feedback</span>
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
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{$feedback->tutor->first_name}} {{$feedback->tutor->last_name}}</td>
                        <td>{{$feedback->description}}</td>
                        
                    </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
</div>
@endsection