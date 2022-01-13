<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        $users=User::where('role','Student')->get();
        return view('admin/dashboard',compact('users'));
    }

     public function profile(){
         $user =User::find(auth()->user()->id);
        return view('admin.settings.profile',compact('user'));
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
    
    public function updateProfile(Request $request)
    {
        $this->validate($request,
            ['first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            ]);

        $user=User::find($request->user_id);

                if ($request->hasFile('profile')) {
                $image = $request->file('profile');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('assets/images/profile');
                $image->move($destinationPath, $name);
                $user->profile =$name;
            }
              $user->first_name = $request['first_name'];
              $user->last_name = $request->last_name;
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

    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin_dashboard');
    }
}
