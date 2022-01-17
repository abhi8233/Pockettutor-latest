<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Models\User;
use App\Models\EmailNotification;
use Mail;
use App\Mail\NotifyUserRegisterMail;
use App\Mail\NotifySuperAdminTurtor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
        $user->subscriptions_id  = isset($data['subscription_id']) ? $data['subscription_id'] : null;
        $user->institution       = isset($data['institution']) ? $data['institution'] : null;
        $user->city_institution  = isset($data['city_institution']) ? $data['city_institution'] : null;
        $user->state_institution  = isset($data['state_institution']) ? $data['state_institution'] : null;
        $user->country_institution= isset($data['country_institution']) ? $data['country_institution'] : null;
        $user->country_id        = isset($data['country_id']) ? $data['country_id'] : null;
        $user->state_id          = isset($data['state_id']) ? $data['state_id'] : null;
        $user->save();

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
