<?php

namespace App\Http\Controllers\Tutor;
use App\Http\Controllers\Controller;
use App\Models\Bookings;

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
        $bookings=Bookings::where('tutor_id',auth()->user()->id)->get();
        return view('tutor/meetings/index',compact('bookings'));
    }
}
