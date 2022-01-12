<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{ 
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
     
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();   
            
            if($user->role == "Tutor"){
               
                if($user->is_document == 0){
                    return redirect()->route('tprofile');
                }else{
                    return redirect()->intended($this->redirectPath());
                }
                
            }else{
                return redirect()->intended($this->redirectPath());
            }
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'login' => 'These credentials do not match our records.',
            ]);
        // return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /* protected $redirectTo = RouteServiceProvider::HOME;*/

    public function redirectTo() {
        /* if change redirection then change in middleware redirect */
        switch (Auth::user()->role) {
            case 'SuperAdmin':
                return '/admin/dashboard';
                break;
            case 'Tutor':
                return '/tutor/dashboard';
                break; 
            case 'Student':
                /* return '/student/dashboard';*/
                return '/student/booking';
                break; 
            default:
                return '/home';
                break;
        }
    }

    
}
