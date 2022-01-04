
@extends('layouts.app')
    <br/>
    <br/>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Booking Slots</h3>
                            <div class="card-tools">
                                <a class="btn btn-success" href="{{route('bookingslot.create')}}"><i class="fas fa-plus"></i> &nbsp; Booking Slot</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-striped userFrm">
                                <thead>
                                <tr>
                                    <th>Tutor Name</th>
                                    <th>Date Time</th>
                                    <th>Specialization</th>
                                    <th>Google Meet Link</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookingslots as $bookingslot)
                                <tr>
                                    <td>{{$bookingslot->tutor->first_name}}</td>
                                    <td>{{$bookingslot->date_time}}</td>
                                    <td>{{$bookingslot->specialization_id}}</td>
                                    <td>{{$bookingslot->google_meet_link}}</td>

                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>

    </section>