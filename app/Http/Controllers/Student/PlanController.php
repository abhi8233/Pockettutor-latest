<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\UserPlan;

use Illuminate\Http\Request;

class PlanController extends Controller
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
        $user_plans = UserPlan::where('user_id', auth()->user()->id)->orderBy('id','desc')->get();
        return view('student.plan.index',compact('user_plans'));
    }
}
