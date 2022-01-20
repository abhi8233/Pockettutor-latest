<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $subscriptions = Subscription::all();
        return view('admin/subscription/index',compact('subscriptions'));
    }

    public function store(Request $request)
    {
        $request->validate([  
            'plan_name' => ['required', 'string', 'max:255'],
            'cost' => ['required'],
            'minutes' => ['required'],
        ]);

        $subscription = new Subscription();
        $subscription->plan = $request->plan_name;
        $subscription->price = $request->cost;
        $subscription->minutes = $request->minutes;
        $subscription->save();

        if($subscription){
            return response()->Json(['status' => '200','msg'=>'Subscription  successfullay added.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscription = Subscription::find($id);
        $subscription->delete();

        return redirect()->route('subscription.index')->with('success','Subscription delete successfully.');
        
    }

}
