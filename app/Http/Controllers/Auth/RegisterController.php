<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Models\User;
use App\Models\UserPlan;
use App\Models\EmailNotification;
use Mail;
use App\Mail\NotifyUserRegisterMail;
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
        // dd($request->all());
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
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'country_id' => ['required'],
                'institution' => ['required'],
                'city_institution' => ['required'],
                'state_institution' => ['required'],
                'country_institution' => ['required'],
                'specialization' => ['required'],
                'language_id' => ['required'],
                'privacy_policy' => ['required'],
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
        $user->state_id          = isset($data['state_id']) ? $data['state_id'] : null;
        $user->save();

        if(isset($data['role']) && $data['role'] == 'Student'){
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            if (is_null($user->stripe_customer_id)) {
                $customer = \Stripe\Customer::create([
                  'payment_method' => 'pm_card_visa',
                  'email' => $user->email,
                  'invoice_settings' => [
                    'default_payment_method' => 'pm_card_visa'
                  ]
                ]);
            }

            // $subscription = \Stripe\Subscription::create([
            //     'customer' => isset($customer->id) ? $customer->id : null,
            //     'items' => [
            //         [
            //             'price' => 'price_1KJFJzGY5uvTG2QRUUfWPpek',
            //         ]
            //     ],
            //   // 'add_invoice_items' => [[
            //   //   'price' => isset($data['price']) ? $data['price'] : null,
            //   // ]],
            // ]);

            // dd($subscription);
        
            $payment = Stripe\Charge::create ([
                "amount" => isset($data['price']) ? $data['price'] : null,
                "currency" => "usd",
                "source" => $data['stripeToken'],
                "description" => "Test payment from itsolutionstuff.com." 
            ]);

            if($payment){
            
                $userPlan = new UserPlan();
                $userPlan->user_id = $user->id;
                $userPlan->subscription_id = isset($data['subscription_id']) ? $data['subscription_id'] : null;
                $userPlan->price = isset($data['price']) ? $data['price'] : null;
                $userPlan->minutes = isset($data['minutes']) ? $data['minutes'] : null;
                $userPlan->remaining_minutes = 0;
                $userPlan->slots = isset($data['slots']) ? $data['slots'] : null;
                $userPlan->is_active  = 1;
                $userPlan->stripe_plan_id  = 1;
                $userPlan->save();

                $updateUser = User::where('id',$user->id)->update([
                    'subscriptions_id' => isset($userPlan->id) ? $userPlan->id : null,
                    'stripe_customer_id' => isset($customer->id) ? $customer->id : null ]);
            }
        }

        Mail::to($user->email)->send(new NotifyUserRegisterMail($user));
        if($user->role == 'Tutor'){
            $email = EmailNotification::get('admin_email')->first();
            Mail::to($email->admin_email)->send(new NotifySuperAdminTurtor($user));
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
