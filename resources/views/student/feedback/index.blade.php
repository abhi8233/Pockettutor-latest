@extends('layouts.studentApp')
@section('css-hooks')
<style type="text/css">
    .starrate span.ctrl { position:absolute; z-index:2;}
    .starrate { color:var(--secondary); cursor:pointer;width: 150px;}
    .starrate.saved { color:var(--dark);}
    .starrate:hover { color:var(--primary);} 
    .starrate.saved:hover { color:var(--orange);}
    #frm-FeedbackAdd
    {
        
    }
</style>
@endsection
@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Feedback</span>
        </label>
            <button class="btn text-decoration-none common-btn ms-2 pt-width-p-auto"  id="show_feedback_model" data-bs-toggle="modal"  data-bs-target="#newFeedback" onclick="create()" style="display: none"><i class="mdi mdi-plus-thick" aria-hidden="true" ></i>
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
                        <td>
                            {{isset($feedback->tutor->first_name) ? $feedback->tutor->first_name : ''}} 
                            {{ isset($feedback->tutor->last_name) ? $feedback->tutor->last_name : '' }}
                        </td>
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
<div class="modal fade " id="newFeedback" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newFeedbackLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newplanLabel">Give your feedback to tutor</h5>
                {{-- <button type="button" class="">
                    <i class="mdi mdi-close-circle-outline" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close"></i>
                </button> --}}
            </div>
            <div class="modal-body pb-5" id="frm-FeedbackAdd">
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-hooks')

<script type="text/javascript">
$(document).ready(function(){
    $(".alert").delay(3000).fadeOut();
    
        @if ($bookingCount>0)
            $("#show_feedback_model").click();
        @endif
    
});
var show=1;
// create();
function create(){
    $.ajax({
        url:"{{ route('sfeedback.create') }}",
        type: "GET", 
        data: {
            _token: '{{csrf_token()}}' 
        },
        success: function(result){
            if(result!=0 && show==1)
            {
                 
                    $("#frm-FeedbackAdd").html(result);
                show=0;
            }
            
        }
    });
}
</script>
@endsection 