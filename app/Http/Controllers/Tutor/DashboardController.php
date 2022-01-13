<?php

namespace App\Http\Controllers\Tutor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use Mail;
use App\Mail\NotifySuperAdminMail;
use App\Models\EmailNotification;
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

    public function updateProfile(Request $request)
    {
        $this->validate($request,
            ['first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255']]);
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
        $user->email = $request->email;
        $user->country_id = $request->country_id;
        $user->language_id = $request->language_id;
        $user->specialization_id = $request->specialization_id;
        $user->save();

        if($request->passport){
            $document =new Document();
            $document->document_key ='passport';
            if ($request->hasFile('passport')) 
            {
                $file = $request->file('passport');
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('assets/images/document');
                $file->move($destinationPath, $name);
                $document->document_value =$name;
            }
            $document->user_id=$user->id;
            $document->save();
        }
        if($request->certificate){
            $document =new Document();
            $document->document_key ='certificate';
            if ($request->hasFile('certificate')) 
            {
                $file = $request->file('certificate');
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('assets/images/document');
                $file->move($destinationPath, $name);
                $document->document_value =$name;
            }
            $document->user_id=$user->id;
            $document->save();
        }
        if($request->other_document){
            $document =new Document();
            $document->document_key ='other_document';
            if ($request->hasFile('other_document')) 
            {
                $file = $request->file('other_document');
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('assets/images/document');
                $file->move($destinationPath, $name);
                $document->document_value =$name;
            }
            $document->user_id=$user->id;
            $document->save();
        }
        

        $email=EmailNotification::get('admin_email')->first();
        $documents =Document::where('user_id',$user->id)->get();
        Mail::to($email->admin_email)->send(new NotifySuperAdminMail($user,$documents));
        if($user){
            return response()->Json(['status' => '200','msg'=>'User Password Update successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }
    }

    public function updatePassword(Request $request){

         $this->validate($request,
            ['new_password' => ['required', 'string', 'min:8'],
            ]);
        $user = User::find(auth()->user()->id);
        $user->password= Hash::make($request->password);
        $user->save();
        if($user){
            return response()->Json(['status' => '200','msg'=>'User Password Update successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }

    }
}
