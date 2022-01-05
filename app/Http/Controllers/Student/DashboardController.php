<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Bookings;
use App\Models\State;
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
        $bookingslots= Bookings::orderBy('id','desc')->get();
        return view('student/dashboard',compact('bookingslots'));
    }

    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
}
