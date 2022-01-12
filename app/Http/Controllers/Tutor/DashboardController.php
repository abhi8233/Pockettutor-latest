<?php

namespace App\Http\Controllers\Tutor;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tutor.dashboard');
    }

    public function profile()
    {
        $user = User::with(['specialization','languages','country'])->where('id',auth()->user()->id)->first();
        return view('tutor.setting.profile',compact('user'));
    }

    public function updateProfile(){
        //update save update fields
    }

    public function updatePassword(Request $request){

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
