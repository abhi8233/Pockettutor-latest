@extends('layouts.studentApp')

@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-cash" aria-hidden="true"></i>
            <span class="ps-1">Plan Info</span>
        </label>
        <div class="d-flex align-items-center">
            @if(empty($userActivePlan) || $userActivePlan->minutes <= $userActivePlan->remaining_minutes)
                <button class="btn text-decoration-none common-btn ms-2" data-bs-toggle="modal" data-bs-target="#upgradePlan" onclick="getSubscription()">
                    Upgrade Plan
                </button>
            @endif
        </div>
    </div>
    <div class="student-list bg-white mt-4">
        <table id="student_list" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Plan Name</th>
                    <th>Monthly Amount</th>
                    <th>Status</th>
                    <th>Minutes</th>
                    <th>Left Minutes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userAllPlans as $plan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $plan->subscription->plan }}</td>
                    <td>$ {{ $plan->price }}</td>
                    <td>
                        @if($plan->is_active == 1)
                            {{ 'Active' }}
                        @else
                            {{ 'Expire' }}
                        @endif
                    </td>
                    <td>{{ $plan->minutes }} Min</td>
                    <td>{{ $plan->remaining_minutes }} Min</td>
                </tr>
                @Endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Upgrade Plan -->
<div class="modal fade" id="upgradePlan" tabindex="-1" aria-labelledby="upgradePlanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upgradeplanLabel">Upgrade Plan</h5>
                <button type="button" class="">
                    <i class="mdi mdi-close-circle-outline" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close"></i>
                </button>
            </div>
            <div class="modal-body pb-5" id="frm-UpgradePlan"></div>
        </div>
    </div>
</div>


<!-- <div class="modal fade" id="payment" tabindex="-1" aria-labelledby="paymentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentLabel">Payment</h5>
                <button type="button" class="">
                    <i class="mdi mdi-close-circle-outline" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close"></i>
                </button>
            </div>
            <div class="modal-body pb-5">
                <div class="mb-3 subscription">
                    <div class="row">
                        <div class="col-12 col-md-3 plan-main">
                            Contents Here
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
@section('js-hooks')
<script type="text/javascript">
    function getSubscription(){
        $.ajax({
            url:"{{ route('splan.create') }}",
            type: "GET", 
            data: {
                _token: '{{csrf_token()}}' 
            },
            success: function(result){
                $("#frm-UpgradePlan").html(result);
            }
        });
    }

    $(document).on('click', '.btn-subscription', function() {
        // alert($(this).data('id'));
        
        $.ajax({
            url:"{{ route('splan.store') }}",
            type: "POST", 
            data: {
                subscription_id : $(this).data('id'),
                price : $(this).data('price'),
                minutes : $(this).data('minutes'),
                remaining_minutes : $(this).data('remaining_minutes'),
                slots : $(this).data('slots'),
                _token: '{{csrf_token()}}' 
            },
            success: function(data){
                if(data.status == 200){
                    $("#msg").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong> You plan has been change.</div>');
                    setTimeout(function() {
                        window.location = "{{ route('splan.index') }}";
                    }, 1000);
                } else if (data.status == 400) {
                    $("#msg").after('<div class="alert alert-warning alert-dismissible" id="myAlert"><strong>Google Meet!</strong>Mismatch Data.</div>');
                }else{
                    $("#msg").after('<div class="alert alert-danger alert-dismissible" id="myAlert"><strong>Opps..!</strong> Something Went to Wrong.</div>');
                }
            }
        });
    });
</script>
@endsection