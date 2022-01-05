<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingslots= Bookings::with(['tutor'])->orderBy('id','desc')->get();
        // dd($bookingslots);
        return view('student.bookingslots.index',compact('bookingslots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations= \App\Models\Specialization::orderBy('id','desc')->get();

        return view('student.bookingslots.create',compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bookingslot=new Bookings;
        $bookingslot->tutor_id= $request->tutor_id;
        $bookingslot->specialization_id= $request->specialization_id;
        $bookingslot->date_time= $request->date_time;
        $bookingslot->user_id= Auth::user()->id;
        $bookingslot->save();
        if($bookingslot){
            return response()->Json(['status' => 'success']);
        }else{
            return response()->Json(['status' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        //
    }

    public function selectedSpecializationTutor(Request $request)
    {
        // dd($request->specialization_id);
        $tutors = User::where(['specialization_id'=>$request->specialization_id,'role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();
        $html = '<option value="">Select Tutor</option>';
        foreach ($tutors as $tutor) {
            $html .= "<option value='" . $tutor->id . "'>" . $tutor->first_name .'' .$tutor->last_name . "</option>";
        }
        echo $html;
    }
}
