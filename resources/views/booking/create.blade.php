@extends('layouts.bookingApp')
@section('content')
	<form id="frm-Credential" enctype="multipart/form-data" class="consent-screen">
        @method('POST')
        @csrf
        <div class="gm-upload-area">
            <input type="file" name="credential" accept=".json"/>
        </div>
        <button type="submit" class="button button-primary button-large">
            Load Credentials
        </button>
    </form>
@endsection
@section('js-hooks')
<script type="text/javascript">
	$("#frm-Credential").validate({
        rules: {
            credential: {
                required: true
            },
        },
        messages: {
            credential: {
                required: "Credential file is required"
            }
        },
        submitHandler: function(form) {
            // alert('valid form submitted'); 
            $.ajax({
                type: "POST",
                url: "{{ route('booking.store') }}",
                data: new FormData($('#frm-Credential')[0]),
                processData: false,
                contentType: false,
                success: function (data) {
                    // console.log(data);
                    // alert(data.status);
                    if (data.status == 200) {
                        $(".date-time").after('<div class="alert alert-success alert-dismissible" id="myAlert"><strong>Success!</strong>Booking booked successfully.</div>');
                        setTimeout(function(){
                            window.location ="{{ route('booking.create') }}";
                        },1000);
                    }else {
                       $(".date-time").after('<div class="alert alert-danger alert-dismissible" id="myAlert"><strong>Opps..!</strong> Something Went to Wrong.</div>');
                    }
                }
            });
            return false;
        }
    });
</script>
@endsection('js-hooks')