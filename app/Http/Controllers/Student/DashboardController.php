<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
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
        return view('student.dashboard');
    }

    public function profile()
    {
        $user =User::find(auth()->user()->id);   
        return view('student.setting.profile',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,
            ['first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255']]);

              $user=User::find($request->user_id);
              $user->first_name = $request['first_name'];
              $user->last_name = $request->last_name;
              $user->email = $request->email;
              $user->save();
                if($user){
                    return response()->Json(['status' => '200','msg'=>'User Password Update successfully.']);
                }else{
                    return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
                }
    }

    public function updatePassword(Request $request)
    {
         $this->validate($request,
            ['new_password' => ['required', 'string', 'min:8'],
            ]);
        $user=User::find(auth()->user()->id);
        $user->password= Hash::make($request->password);
        $user->save();
        if($user){
            return response()->Json(['status' => '200','msg'=>'User Password Update successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }

    }

    
}
