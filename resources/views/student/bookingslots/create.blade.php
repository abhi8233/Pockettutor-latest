@extends('layouts.app')

@section('content')
    <br/>
    <br/>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Booking slot</h3>
                            <div class="card-tools">
                                <a class="btn btn-success" href="{{route('bookingslot.index')}}"><i
                                        class="fas fa-eye"></i> &nbsp; View Booking Slot</a>
                            </div>
                        </div>
                        <form class="bookingslotFrm">
                            @method('POST')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-10">
                                        <label for="specialization_id"> Specialization</label>
                                        <select class="form-control select2 specialization_id" name="specialization_id">
                                            <option value=""> Select Specialization</option>
                                            @foreach($specializations as $specialization)
                                                <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-10">
                                        <label for="tutor_id"> Tutor</label>
                                        <select class="form-control select2 tutor_id" name="tutor_id">
                                            <option value=""> Select Tutor</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-10">
                                        <label for="date_time"> Date & Time</label>
                                        <input type="datetime-local" class="form-control" name="date_time">
                                    </div>

                                    <div class="form-group col-10">
                                        <button type="submit" class="btn btn-primary submit">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </section>
    <script>
        $(document).ready(function () {
            $(document).on('change', '.specialization_id', function () {
                if ($(this).val() != null) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('tutor.select')}}",
                        data: {
                            '_token': $('input[name="_token"]').val(),
                            'specialization_id': $(this).val()
                        },
                        success: function (data) {
                            // console.log(data);
                            $(".tutor_id").html("");

                            $(".tutor_id").html(data);

                        }
                    });
                }
            })
            $(".bookingslotFrm").validate({
                rules:
                    {
                        tutor_id:
                            {
                                required: true
                            },
                        specialization_id:
                            {
                                required: true
                            },
                        date_time:
                            {
                                required: true
                            },
                    },
                messages:
                    {
                        tutor_id:
                            {
                                required: "Tutor is required"
                            },
                        specialization_id:
                            {
                                required: "Taluka is required"
                            },
                        date_time:
                            {
                                required: "Date Time is required"
                            },

                    },
                highlight: function (element) {
                    $(element).closest('.form-group').addClass('has-error');
                    $('.help-block').css('color', 'red');
                },
                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $(".submit").click(function (event) {
                // alert('he');
                event.preventDefault();
                if ($(".bookingslotFrm").valid()) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('bookingslot.store')}}",
                        data: new FormData($('.bookingslotFrm')[0]),
                        processData: false,
                        contentType: false,

                        success: function (data) {
                            if (data.status === 'success') {
                                swal({
                                    title: "Success",
                                    text: "Booking Slot Successfully",
                                    type: "success"
                                }, function () {
                                    window.location ="{{route('bookingslot.index')}}"
                                });

                            } else if (data.status === 'error') {
                                swal({
                                    title: "Error",
                                    text: "Opps..! Something Went to Wrong.",
                                    type: "error"
                                });

                            }


                        }
                    });
                } else {
                    event.preventDefault();
                }
            });

        });

    </script>
@endsection
