<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Bookings;
use App\Models\Specialization;
use App\Models\languages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookingslots= Bookings::with(['tutor','specialization'])->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        // dd($bookingslots);
        return view('student.booking.index',compact('bookingslots'));
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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

    public function getTutor(Request $request)
    {
        // dd($request->specialization_id);
        if(isset($request->specialization_id)){
            $tutors = User::where(['specialization_id'=>$request->specialization_id,'role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();
            
        }else if(isset($request->language_id)){
            $tutors = User::where(['language_id'=>$request->language_id,'role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();
           
        }else if(isset($request->specialization_id) && isset($request->language_id)){
            $tutors = User::where(['specialization_id'=>$request->specialization_id,'language_id'=>$request->language_id,'role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();
        }

        $html = '<option value="">Select Tutor</option>';
        foreach ($tutors as $tutor) {
            $html .= "<option value='" . $tutor->id . "'>" . $tutor->first_name .'' .$tutor->last_name . "</option>";
        }
        echo $html;
        
    }
}
