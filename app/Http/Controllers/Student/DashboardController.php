<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Bookings;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $bookingslots= Bookings::with(['tutor'])->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        // dd($bookingslots);
        return view('student/dashboard',compact('bookingslots'));
    }

    
}
