<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Subscription;
use App\Models\UserPlan;
use Mail;
use App\Mail\NotifyUserSubscriptionPlanMail;
use App\Models\User;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
		
		$subscription = Subscription::where('id',$request->planId)->where('status','Active')->first();
		
			$User=User::where('id',auth()->user()->id)->first();
			// dd($User,"Id: ".$User->id.", Username: ".$User->first_name ." ". $User->first_name.", Email: ".$User->email.", Country: ".$User->country_id.", Description: Payment From Pocket Tutor.");
			Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
			$Stripe_data=Stripe\Charge::create ([
					"amount" => ($subscription->price*100),
					// "amount" => (115*100),
					"currency" => "usd",
					"source" => $request->stripeToken,
					"description" => "Id: ".$User->id.", Email: ".$User->email.", Country: ".$User->country_id.", Description: Payment From Pocket Tutor.",
					"statement_descriptor"=>$User->first_name ." ". $User->last_name
					
			]);
			
            $plan = UserPlan::where('user_id', auth()->user()->id)->where('is_active', 1)->update([ 'is_active' => 0 ]);
			
            $userplan = new UserPlan();
            $userplan->user_id = auth()->user()->id;
            $userplan->subscription_id = $subscription->id;
            $userplan->price = $Stripe_data->amount/100;
            $userplan->stripe_plan_id = $Stripe_data->id;
            // $userplan->slots = $request->slots;
            $userplan->minutes = $subscription->minutes;
            $userplan->remaining_minutes = $subscription->  minutes;
            $userplan->is_active = $Stripe_data->paid;
            $userplan->save();
		Mail::to(auth()->user()->email)->send(new NotifyUserSubscriptionPlanMail(auth()->user()));
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}