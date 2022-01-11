@extends('layouts.studentApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Feedback</span>
        </label>
        <button class="btn text-decoration-none common-btn ms-2 pt-width-p-auto" data-bs-toggle="modal" data-bs-target="#newplan">
                <i class="mdi mdi-plus-thick" aria-hidden="true"></i>
                Add New Plan
            </button>
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
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{$feedback->tutor->first_name}} {{$feedback->tutor->last_name}}</td>
                        <td>{{$feedback->description}}</td>
                        <td>-</td>
                        
                    </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
</div>
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
                        <label for="email" class="col-form-label p-0 mb-1">Tutor Name<span class="pt-color-red pt-fs-16">*</span> </label>
                        <select>
                            <option>abc</option>
                            <option>abc123</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">description <span class="pt-color-red pt-fs-16">*</span> </label>
                        <textarea class="form-control"></textarea> 
                    </div>

                    <div class="mb-5">
                        <label for="email" class="col-form-label p-0 mb-1">Rating <span class="pt-color-red pt-fs-16">*</span> </label>
                        <div id="starrate" class="starrate mt-3" data-val="2.5" data-max="5">
                            <span class="ctrl"></span>
                            <span class="cont m-1">
                            <i class="fas fa-fw fa-star"></i> 
                            <i class="fas fa-fw fa-star"></i> 
                            <i class="fas fa-fw fa-star-half-alt"></i> 
                            <i class="far fa-fw fa-star"></i> 
                            <i class="far fa-fw fa-star"></i> 
                            </span>
                            
                         </div>
                    </div>

                    

                    <div>
                        <button class="btn text-decoration-none common-btn " data-bs-toggle="modal" data-bs-target="#newplan">
                            add
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection