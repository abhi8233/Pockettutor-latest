<?php

namespace App\Http\Controllers\Tutor;
use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\CustomClass\Meet;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		
	  /* $this->meet = new Meet(7);
	  $meetings = $this->meet->getMeetingList();
	  dd($this->meet->getMeetingDuration("em6suqtqtatipkdgp37itppntk"),$meetings);
	   */
        $bookings = Bookings::with(['user'])->where('tutor_id',auth()->user()->id)->get();
        // dd($bookings);
        return view('tutor.meetings.index',compact('bookings'));
    }
}
