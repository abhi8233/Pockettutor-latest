<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Feedback;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $feedbacks = Feedback::with(['tutor'])->where('user_id', auth()->user()->id)->orderBy('id','desc')->get();
        return view('student.feedback.index',compact('feedbacks'));
    }
}
