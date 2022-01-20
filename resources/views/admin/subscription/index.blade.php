@extends('layouts.adminApp')
@section('css-hooks')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@section('content')
<div class="student-list-page main-top">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-cash" aria-hidden="true"></i>
            <span class="ps-1">Subscription Plan</span>
        </label>
        <div class="d-flex align-items-center">
           <!--  <div class="date-filter">
                <input type="text" class="form-control" id="stu_list_daterange" />
            </div> -->
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
                    <th>Status</th>
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
                    <td>
                        <div class="form-check form-switch">
                            <input data-id="{{$subscription->id}}" class="form-check-input toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Deactive" {{ $subscription->status== 'Active' ? 'checked' : '' }}>
                        </div>
                    </td>
                    <td>
                        <form action="{{ route('subscription.destroy',$subscription->id) }}" method="POST">
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


<!-- Add Plan -->
<div class="modal fade " id="newplan" tabindex="-1" aria-labelledby="newplanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="newplanLabel">Add New Plan</h5>
                <button type="button" class="">
                    <i class="mdi mdi-close-circle-outline" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close"></i>
                </button>
            </div>
            <div class="modal-body pb-5">
                <!-- action="{{route('subscription.store')}}" -->
                <form id="frm-subscription" name="frm-subscription" class="pt-width-p-80 my-0 mx-auto">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Plan Name <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" id="plan_name" placeholder="Enter plan name" class="form-control" name="plan_name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="col-form-label p-0 mb-1">Monthly Cost <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter monthly cost" class="form-control" id="cost" name="cost">
                    </div>

                    <div class="mb-5">
                        <label for="email" class="col-form-label p-0 mb-1">Minutes <span class="pt-color-red pt-fs-16">*</span> </label>
                        <input type="text" placeholder="Enter minutes" class="form-control" id="minutes" name="minutes">
                    </div>

                    <div>
                        <button type="submit"  class="btn text-decoration-none common-btn ">
                            Create Plan
                        </button>
                    </div>
                </form>
                <div id="msg"></div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js-hooks')
<script>
    
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 'Active' : 'Deactive'; 
            var subscription_id = $(this).data('id'); 
             
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('changeStatus') }}",
                data: {'status': status, 'subscription_id': subscription_id},
                success: function(data){
                    if (data.status == 200) {
                        $(".table").before('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Status change successfully.</div>');
                        setTimeout(function(){
                            window.location ="{{ route('subscription.index') }}";
                        },1000);
                    } else {
                        alert("Opps..! Something Went to Wrong.")
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $("#frm-subscription").validate({
            rules: {
                plan_name: {
                    required: true
                },
                cost: {
                    required: true
                },
                minutes: {
                    required: true
                }
            },
            messages: {
                plan_name: {
                    required: "Plan Name is required"
                },
                cost: {
                    required: "Cost is required"
                },
                minutes: {
                    required: "Minutes is required"
                }
            },
            submitHandler: function(form) {
                jQuery.ajax({
                    type: 'POST',
                    url: "{{route('subscription.store')}}",
                    data: new FormData($('#frm-subscription')[0]),
                    processData: false,
                    contentType: false,
                    success: function(data){
                        if (data.status == 200) {
                            $("#msg").html('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Subscription added successfully.</div>');
                            setTimeout(function(){
                                window.location ="{{ route('subscription.index') }}";
                            },1000);
                        } else {
                            alert("Opps..! Something Went to Wrong.")
                        }
                        jQuery('.alert-danger').hide();
                        $('#newplan').modal('hide');
                    }
                });
            }
        });
    });

    setTimeout(function(){
        $(".alert-success").remove();
    },1000);

</script>
@endsection