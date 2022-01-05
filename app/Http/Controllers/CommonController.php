<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bookings;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//     public function index()
//     {
//         $user=Auth::user();

//         if ($user->role == 'Student') {
//             $bookingslots= Bookings::orderBy('id','desc')->get();
//             return view('student.dashboard',compact('bookingslots'));
//         }else{
//             return view('home');
//         }
//     }
//     public function adminHome()
//     {
// //        dd('hes');
//         return view('adminHome');
//     }

//     public function editProfile(){
//         $user=Auth::user();
//         $specializations= \App\Models\Specialization::orderBy('id','desc')->get();
//         $institutions= \App\Models\Institution::orderBy('id','desc')->get();
//         $fieldInterests= \App\Models\FieldInterest::orderBy('id','desc')->get();
//         $languages= \App\Models\Languages::orderBy('id','desc')->get();
//         $countries= \App\Models\Country::orderBy('id','desc')->get();
//         $states= \App\Models\State::orderBy('id','desc')->get();
//         return view('users.editprofile',compact('specializations','institutions','fieldInterests','languages','countries','states','user'));
//     }
//     public function updateProfile(Request $request){
//         $params=$request->all();
//         unset($params['_token'],$params['_method']);
//         $user=User::where('id',Auth::user()->id)->update([$params]);
//         if($user){
//             return response()->Json(['status' => 'success']);
//         }else{
//             return response()->Json(['status' => 'error']);
//         }

//     }
}
