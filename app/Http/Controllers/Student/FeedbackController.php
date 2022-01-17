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
       
        return view('student.feedback.index',compact('feedbacks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function create(){

        $booking_slot = Bookings::with(['tutor'])->whereDate('date_time','<',Carbon::now())->where('user_id',auth()->user()->id)->where('is_feedback',0)->get();
        return view('student.feedback.create',compact('booking_slot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $split = explode('_', $request->booking_tutor_id);
        $booking_id = $split[0];
        $tutor_id = $split[1];

        $feedbacks = Feedback::where('user_id', auth()->user()->id)->where('tutor_id',$tutor_id)->where('tutor_id',$booking_id)->orderBy('id','desc')->get();
        
        if(isset($feedbacks) && !empty($feedbacks[0])){
            return redirect()->back()->with('danger', 'Already feedback added.');
        }else{

            $feedback = new Feedback();
            $feedback->tutor_id = $tutor_id;
            $feedback->user_id = auth()->user()->id;
            $feedback->booking_id = $booking_id;
            $feedback->description = $request->description;
            $feedback->rating = $request->star;
            $feedback->save();

            $bookings = Bookings::where('id', $booking_id)->update(
                array('is_feedback' => 1)
            );

            return redirect()->back()->with('success', 'Feedback Added Successfully');
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

}
