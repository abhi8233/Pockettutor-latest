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
            'cost' => ['required', 'string', 'max:255'],
            'minutes' => ['required', 'string', 'email', 'max:255'],
            'slot' => ['required', 'string', 'email', 'max:255'],
        ]);
        $subscription = new Subscription();
        $subscription->plan=$request->plan_name;
        $subscription->price=$request->cost;
        $subscription->minutes=$request->minutes;
        $subscription->slots=$request->slot;
        $subscription->save();
        return redirect()->back()->with('success', 'Subscription  successfullay added.'); 
   }
}
