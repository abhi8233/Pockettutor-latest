@extends('layouts.adminApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-cash" aria-hidden="true"></i>
            <span class="ps-1">Subscription Plan</span>
        </label>
        <div class="d-flex align-items-center">
            <div class="date-filter">
                <input type="text" class="form-control" id="stu_list_daterange" />
            </div>
            <button class="btn text-decoration-none common-btn ms-2 pt-width-p-auto" data-bs-toggle="modal" data-bs-target="#newplan">
                <i class="mdi mdi-plus-thick" aria-hidden="true"></i>
                Add New Plan
            </button>
        </div>
    </div>
    <div class="student-list bg-white p-3 mt-4">
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
                    <th>Plan Name</th>
                    <th>Monthly Cost</th>
                    <th>Minutes</th>
                    <th>Active Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $subscription)
                <tr>
                    <td>{{$subscription->id}}</td>
                    <td>{{$subscription->plan}}</td>
                    <td>${{$subscription->price}}</td>
                    <td>{{$subscription->minutes}} min</td>
                    <td>{{$subscription->created_at}}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Add Plan -->
<div class="modal fade " id="newplan" tabindex="-1" aria-labelledby="newplanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newplanLabel">Add New Plan</h5>
                <button type="button" class="">
                    <i class="mdi mdi-close-circle-outline" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close"></i>
                </button>
            </div>
            <div class="modal-body pb-5">
                <form method="post" action="{{route('add_subscription')}}" class="pt-width-p-80 my-0 mx-auto">
                         @csrf
                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Plan Name <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter plan name" class="form-control" name="plan_name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Monthly Cost <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter monthly cost" class="form-control" name="cost">
                    </div>

                    <div class="mb-5">
                        <label for="email" class="col-form-label p-0 mb-1">Minutes <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter minutes" class="form-control" name="minutes">
                    </div>

                    <div class="mb-3">
                        <label for="slot" class="col-form-label p-0 mb-1">Slots <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter slot" class="form-control" name="slot">
                    </div>

                    <div>
                        <button class="btn text-decoration-none common-btn " data-bs-toggle="modal" data-bs-target="#newplan">
                            Create Plan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection