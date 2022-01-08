@extends('layouts.adminApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Student List</span>    
        </label>
        <div class="pr-5">
            <a class="p-0 text-decoration-none  btn btn-primary pr-5" href="{{ route('register') }}"><span class="m-3">Add</span></a>
        </div>
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
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{isset($user->subscriptions->plan) ? $user->subscriptions->plan:''}}</td>
                    <td>${{isset($user->subscriptions->price) ? $user->subscriptions->price:''}}</td>
                    <td>{{isset($user->subscriptions->minutes) ? $user->subscriptions->minutes:''}}</td>
                    <td>{{isset($user->subscriptions->slots) ? $user->subscriptions->slots:''}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_date}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('user_edit',$user->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('user_delete',$user->id) }}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection