<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
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

        $subscriptions=Subscription::all();
        return view('admin/subscription/index',compact('subscriptions'));
    }

    public function store(Request $request)
   {
     $request->validate([  
            'plan_name' => ['required', 'string', 'max:255'],
            'cost' => ['required'],
            'minutes' => ['required'],
            'slot' => ['required'],
        ]);
        $subscription = new Subscription();
        $subscription->plan=$request->plan_name;
        $subscription->price=$request->cost;
        $subscription->minutes=$request->minutes;
        $subscription->slots=$request->slot;
        $subscription->save();
         if($subscription){
            return response()->Json(['status' => '200','msg'=>'Status change successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }
        // return redirect()->back()->with('success', 'Subscription  successfullay added.'); 
   }

   public function changeStatus(Request $request)
    {
        $subscription = Subscription::find($request->subscription_id);
        $subscription->status = $request->status;
        $subscription->save();
        if($subscription){
            return response()->Json(['status' => '200','msg'=>'Status change successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }
    }
}
