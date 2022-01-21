<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\UserPlan;
use App\Models\Subscription;

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
        $userAllPlans = UserPlan::where('user_id', auth()->user()->id)->orderBy('id','desc')->get();

        $userActivePlan = UserPlan::where('user_id', auth()->user()->id)->where('is_active',1)->first();
        // dd($userActivePlan);
        return view('student.plan.index',compact('userAllPlans','userActivePlan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function create(){

        $subscription = Subscription::where('status','Active')->get();
        return view('student.plan.create',compact('subscription'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([  
            'subscription_id' => 'required',
            'price'           => 'required',
            // 'slots'           => 'required',
            'minutes'         => 'required'
        ]);

        $userActivePlan = UserPlan::where('user_id', auth()->user()->id)->where('is_active',1)->first();

        
        if(isset($userActivePlan) && !($userActivePlan->minutes <= $userActivePlan->remaining_minutes)){
            return response()->Json(['status' => '400','msg' => 'Current plan is active.']);
        }else{

            $plan = UserPlan::where('user_id', auth()->user()->id)->where('is_active', 1)->update([ 'is_active' => 0 ]);

            $userplan = new UserPlan();
            $userplan->user_id = auth()->user()->id;
            $userplan->subscription_id = $request->subscription_id;
            $userplan->price = $request->price;
            // $userplan->slots = $request->slots;
            $userplan->minutes = $request->minutes;
            $userplan->remaining_minutes = 0;
            $userplan->is_active = 1;
            $userplan->save();
            
            return response()->Json(['status' => '200','msg' => 'You plan has been change.']);
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
