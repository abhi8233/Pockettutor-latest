@extends('layouts.adminApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Tutor List</span>    
        </label>
        <div>
            <a class="p-0 text-decoration-none  btn btn-primary pr-5" href="{{ route('register') }}"><span class="m-3">Add</span></a>
        </div>
        <div class="date-filter">
            <input type="text" class="form-control" id="stu_list_daterange" />
        </div>
    </div>
    <div class="student-list bg-white mt-4">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
             </div>
        @endif
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
                    <th>Document</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                    <td>{{$user->id}}</td>
                    <td>{{isset($user->languages->name) ? $user->languages->name:''}}</td>
                    <td>{{isset($user->Country->name) ? $user->Country->name:''}}</td>
                    <td>{{isset($user->State->name) ? $user->State->name:''}}</td>
                    <td>{{isset($user->specialization->name) ? $user->specialization->name:''}}</td>
                    <td><img src="../assets/images/icons/pdf-icon.svg"></td>
                    <td>
                        <form action="{{ route('tutor.destroy',$user->id) }}" method="POST">
    
                        <a class="btn btn-primary" href="{{ route('tutor.edit',$user->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                         
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection