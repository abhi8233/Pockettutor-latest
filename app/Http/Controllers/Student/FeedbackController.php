<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\Feedback;
use App\Models\Bookings;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $feedbacks = Feedback::with(['tutor'])->where('user_id', auth()->user()->id)->orderBy('id','desc')->get();
        $bookingCount = Bookings::where('user_id',auth()->user()->id)->where('is_feedback',1)->count();
       
        return view('student.feedback.index',compact('feedbacks','bookingCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function create(){

        $booking = Bookings::with(['tutor'])->where('user_id',auth()->user()->id)->where('is_feedback',1)->first();
        
        return view('student.feedback.create',compact('booking'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $booking_id =$request->booking_id;
        $tutor_id =$request->tutor_id;
        
        $feedback = new Feedback();
        $feedback->tutor_id = $tutor_id;
        $feedback->user_id = auth()->user()->id;
        $feedback->booking_id = $booking_id;
        $feedback->description = $request->description!=""?$request->description:"-";
        $feedback->rating = $request->star;
        $feedback->save();

        Bookings::where('id', $booking_id)->update(['is_feedback' =>"0"]);
        // dd($booking_id);
        return redirect()->back()->with('success', 'Feedback Added Successfully');
    
         
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

}
