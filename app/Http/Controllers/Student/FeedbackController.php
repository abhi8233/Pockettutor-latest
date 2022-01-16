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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $feedbacks = Feedback::with(['tutor'])->where('user_id', auth()->user()->id)->orderBy('id','desc')->get();
        $booking_slot=Bookings::with(['tutor'])->whereDate('date_time','<',Carbon::now())->where('user_id',auth()->user()->id)->get();
        
        return view('student.feedback.index',compact('feedbacks','booking_slot'));
    }
    public function store(Request $request)
    {
        $feedbacks = Feedback::where('user_id', auth()->user()->id)->where('tutor_id',$request->tutor_id)->orderBy('id','desc')->get();
        if(isset($feedbacks)){
                return redirect()->back()->with('danger', 'Already feedback added.');
        }else{
            $feedback=new Feedback();
            $feedback->tutor_id=$request->tutor_id;
            $feedback->user_id= auth()->user()->id;
            $feedback->description=$request->description;
            $feedback->rating=1;
            $feedback->save();
            return redirect()->back()->with('success', 'Feedback Added Successfully');
        }
        
    }
}
