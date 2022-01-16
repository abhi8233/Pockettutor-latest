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
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_plans = UserPlan::where('user_id', auth()->user()->id)->where('is_active',1)->orderBy('id','desc')->get();
        $plans =UserPlan::where('user_id', auth()->user()->id)->where('is_active',1)->where('minutes','>','remaining_minutes')->orderBy('id','desc')->get();
        // dd($plans);
        return view('student.plan.index',compact('user_plans','plans'));
    }
}
