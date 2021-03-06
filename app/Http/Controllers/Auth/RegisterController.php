<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Models\User;
use App\Models\UserPlan;
use App\Models\Setting;
use Session;
use Mail;
use App\Mail\NotifyUserRegisterMail;
use App\Models\Subscription;
use App\Mail\NotifySuperAdminTurtor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use Stripe; 

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */ 
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //create a new method that overrides default register 
    public function register(Request $request)
    {
	
		
        if(isset($request->email))
		{
			$check_email = $request->email;

		}elseif(isset($request->tutor_email)){

			$check_email = $request->tutor_email;

		}
		$userExct = User::where('email',$check_email)->count();
		
		if($userExct){

			if($request->is_email_check){

				return ["message"=>"Email already exists!, try another email","status"=>1];

			}else{

				Session::flash('error', 'Email already exists!, try another email');
				return back();
			}
		}

        if($request->is_email_check){

            return ["message"=>"Email use","status"=>0];
        }
		
        $this->validator($request->all())->validate();
		
        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
        //this commented to avoid register user being auto logged in

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
		if(isset($data['role']) && $data['role'] == 'Tutor'){
            return Validator::make($data, [
                'tutor_first_name' => ['required', 'string', 'max:255'],
                'tutor_last_name' => ['required', 'string', 'max:255'],
                'tutor_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'tutor_country_id' => ['required'],
                'tutor_password' => ['required', 'string', 'min:8','required_with:password_confirmation','same:tutor_password_confirmation'],
                'tutor_password_confirmation' => ['required', 'string', 'min:8'],
                'institution' => ['required'],
                'country_institution' => ['required'],
                'state_institution' => ['required'],
                'city_institution' => ['required'],
                'specialization' => ['required'],
                'language_id' => ['required'],
                'tutor_privacy_policy' => ['required'],
            ]);
        }else if(isset($data['role']) && $data['role'] == 'Student'){
            return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'country_id' => ['required'],
                'subscription_id' => ['required'],
                'card_holder' => ['required'],
                'card_number' => ['required'],
                'cvc' => ['required'],
                'month' => ['required'],
                'year' => ['required'],
                'stripeToken' => ['required'],
                'privacy_policy' => ['required'],
            ]);
        }else{
            return Validator::make($data, [
                'role' => ['required'],
            ]);
        } 
        
    }

    //we will maintain the default create method but you can tweak it to suit you needs
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        

        if(isset($data['role']) && $data['role'] == 'Student'){
            $subscription = Subscription::where('id',$data['plan_id'])->where('status','Active')->first();

            $user = new User();
            $user->name        = '-';
            $user->first_name        = $data['first_name'];
            $user->last_name         = $data['last_name'];
            $user->role              = $data['role'];
            $user->email             = $data['email'];
            $user->password          = Hash::make($data['password']);
            $user->profile           = null;
            $user->specialization_id = isset($data['specialization']) ? $data['specialization'] : null;
            $user->language_id       = isset($data['language_id']) ? $data['language_id'] : null;
            
            $user->institution       = isset($data['institution']) ? $data['institution'] : null;
            $user->city_institution  = isset($data['city_institution']) ? $data['city_institution'] : null;
            $user->state_institution  = isset($data['state_institution']) ? $data['state_institution'] : null;
            $user->country_institution= isset($data['country_institution']) ? $data['country_institution'] : null;
            $user->country_id        = isset($data['country_id']) ? $data['country_id'] : null;
            $user->stripe_customer_id =  '-';
            $user->save();

            
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
			$Stripe_data=Stripe\Charge::create ([
					"amount" =>($subscription->price*100),
					"currency" => "usd",
					"source" => $data['stripeToken'],
					"description" => "Test payment from shop.zinnfy.com" 
			]);
			
            // if($payment){
            
			$userPlan = new UserPlan();
			$userPlan->user_id = $user->id;
			
			$userPlan->subscription_id = isset($data['subscription_id']) ? $data['subscription_id'] : null;
			$userPlan->price = isset($subscription->price) ? $Stripe_data->amount/100 : null;
			$userPlan->minutes = isset($subscription['minutes']) ? $subscription['minutes'] : null;
			$userPlan->remaining_minutes = isset($subscription['minutes']) ? $subscription['minutes'] : 0;
			$userPlan->is_active  = $Stripe_data->paid;
			$userPlan->stripe_plan_id = $Stripe_data->id;
			$userPlan->save();
			

                // $updateUser = User::where('id',$user->id)->update([
                //     'subscriptions_id' => isset($userPlan->id) ? $userPlan->id : null,
                //     'stripe_customer_id' => isset($customer->id) ? $customer->id : null ]);
            $updateUser = User::where('id',$user->id)->update([
                    'subscriptions_id' => isset($userPlan->id) ? $userPlan->id : null,
                    'stripe_customer_id' =>  '-' ]);
            // }
        }else{
            $user = new User();
            $user->name        = '-';
            $user->first_name        = $data['tutor_first_name'];
            $user->last_name         = $data['tutor_last_name'];
            $user->role              = $data['role'];
            $user->email             = $data['tutor_email'];
            $user->country_id        = isset($data['tutor_country_id']) ? $data['tutor_country_id'] : null;
            $user->password          = Hash::make($data['tutor_password']);
            $user->profile           = null;
            $user->institution       = isset($data['institution']) ? $data['institution'] : null;
            $user->country_institution= isset($data['country_institution']) ? $data['country_institution'] : null;
            $user->state_institution  = isset($data['state_institution']) ? $data['state_institution'] : null;
            $user->city_institution  = isset($data['city_institution']) ? $data['city_institution'] : null;
            $user->specialization_id = isset($data['specialization']) ? $data['specialization'] : null;
            $user->language_id       = isset($data['language_id']) ? $data['language_id'] : null;
            $user->stripe_customer_id =  '-';
            $user->save();

            $targetfile = "/credential".$user->id.".json";
            copy(env('CREDENTIAL_PATH')."/credential.json",env('CREDENTIAL_PATH').$targetfile);
        }

        try {
            Mail::to($user->email)->send(new NotifyUserRegisterMail($user));
        } catch (Exception $e) {
            
        }
        
        if($user->role == 'Tutor'){
            $email = Setting::where("setting_key","notification_admin_email")->first();
            Mail::to($email->notification_admin_email)->send(new NotifySuperAdminTurtor($user));
        }
        
        return $user;
        
        // return User::create([
        //     'first_name' => $data['first_name'],
        //     'last_name' => $data['last_name'],
        //     'role'=>$data['role'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'specialization_id' => $data['specialization'],
        //     'language_id' => $data['language_id'],
        //     'subscription_id'=>isset($data['subscription_id']) ? $data['subscription_id'] :null,
        //     'country_id' => $data['country_id'],
        //     'state_id' => $data['state_id'],
        // ]);
    }

    
}
