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
                Add New Feedback
            </button>
        <div class="d-flex align-items-center">
            <input type="text" class="form-control" id="stu_list_daterange" />
        </div>
    </div>
    <div class="student-list bg-white mt-4">
        @if (\Session::has('danger'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('danger') !!}</li>
                </ul>
             </div>
        @endif
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
                    <th>Tutor Name</th>
                    <th>Feedback</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)   
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{isset($feedback->tutor->first_name) ? $feedback->tutor->first_name : ''}} {{ isset($feedback->tutor->last_name) ? $feedback->tutor->last_name : '' }}</td>
                        <td>{{$feedback->description}}</td>
                        <td>
                            @foreach(range(1,5) as $i)
                                <span class="fa-stack" style="width:1em">
                                    <i class="far fa-star fa-stack-1x"></i>

                                    @if($feedback->rating >0)
                                        @if($feedback->rating >0.5)
                                            <i class="fas fa-star fa-stack-1x"></i>
                                        @else
                                            <i class="fas fa-star-half fa-stack-1x"></i>
                                        @endif
                                    @endif
                                    @php $feedback->rating--; @endphp
                                </span>
                            @endforeach
                            
                    </td>
                        
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
                <form method="post" action="{{route('sfeedback.store')}}" class="pt-width-p-80 my-0 mx-auto">
                         @csrf
                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Tutor Name<span class="pt-color-red pt-fs-16">*</span> </label>
                        <select name="tutor_id">
                            @foreach($booking_slot as $booking)
                            <option value="{{$booking->tutor->id}}">{{$booking->tutor->first_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">description <span class="pt-color-red pt-fs-16">*</span> </label>
                        <textarea class="form-control" name="description"></textarea> 
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
                        <button type="submit" class="btn text-decoration-none common-btn " data-bs-toggle="modal" data-bs-target="#newplan">
                            Add Feedback
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-hooks')
<script type="text/javascript">
$(document).ready(function(){
    $(".alert").delay(3000).fadeOut();
})
</script>
@endsection 