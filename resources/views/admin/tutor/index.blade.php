@extends('layouts.adminApp')

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-outline" aria-hidden="true"></i>
            <span class="ps-1">Tutor List</span>    
        </label>
        <!-- <div class="date-filter">
            <input type="text" class="form-control" id="stu_list_daterange" />
        </div> -->
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
                    <th>Specialization</th>
                    <th>Language</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{isset($user->specialization->name) ? $user->specialization->name:''}}</td>
                        <td>{{isset($user->languages->name) ? $user->languages->name:''}}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input data-id="{{$user->id}}" class="form-check-input toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Deactive" {{ $user->is_document == 1 ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#showTutorDocument" onclick="showTutorDocument('{{$user->id}}','{{ route('tutor.show',$user->id) }}')" ><i class="fa fa-eye text-white"></i></a>

                            <a class="btn btn-primary"  href="{{ route('tutor.edit',$user->id) }}"><i class="fa fa-edit"></i></a>

                            <form action="{{ route('tutor.destroy',$user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade " id="showTutorDocument" tabindex="-1" aria-labelledby="showTutorDocumentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="newplanLabel">Tutor Document</h5>
                <button type="button" class="">
                    <i class="mdi mdi-close-circle-outline" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close"></i>
                </button>
            </div>
            <div class="modal-body pb-5" id="document_details">
                
            </div>
        </div>
    </div>
</div>

@endsection
@section('js-hooks')
<script type="text/javascript">
    setTimeout(function(){
        $(".alert-success").remove();
    },1000);
    $(document).ready(function() {
        $(document).on('change', '.toggle-class', function() {
            var status = $(this).prop('checked') == true ? 1 : 0; 
            $.ajax({
                type: "POST",
                url: "{{route('changeTutorStatus')}}",
                data: {
                    'status': status,
                    'user_id': $(this).data('id'),
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                   window.location.href = "{{ route('tutor.index') }}"
                }
            });
        });
    });
    function showTutorDocument(tutor_id,action_url){
        $.ajax({
            url: action_url,
            type: "GET",
            data : {
                _token: '{{csrf_token()}}'
            },
            success: function(data){
               $("#document_details").html(data);
            }
        });
    }
</script>
@endsection