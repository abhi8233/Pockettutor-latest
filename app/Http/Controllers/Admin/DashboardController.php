<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users=User::where('role','Student')->get();
        return view('admin/dashboard',compact('users'));
    }
    public function edit($id)
    {
        $user=User::find($id);
        return view('admin/edituser',compact('user'));
    }

    public function update(Request $request)
    {
            $users=User::find($request->id);
            $users->first_name = $request->first_name;
            $users->last_name = $request->last_name;
            $users->email = $request->email;
            $users->role=$request->role;
            $users->specialization_id = $request->specialization;
            $users->country_id =$request->country_id;
            $users->language_id =$request->language_id;
           $users->state_id = $request->state_id;
           $users->subscriptions_id=$request->subscription_id;
           $users->save();
           if($users->role == 'Student'){
                return redirect()->route('admin_dashboard');
           }
           else{
                return redirect()->route('admin_tutor');
           }
           
    }
    
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin_dashboard');
    }
}
