<?php
namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Document;
use App\Models\EmailNotification;

use Mail;
use App\Mail\NotifySuperAdminMail;

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
        $user = User::with(['specialization','languages','document'])->where('id',auth()->user()->id)->first();

        return view('tutor.setting.profile',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,
            [
                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255']
            ]
        );

        $user = User::find($request->user_id);

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



        $documentValue = [];
        $passport_doc = Document::where("user_id",auth()->user()->id)->where("document_key","passport")->first();

        if($request->passport && isset($passport_doc->id)){
            if ($request->hasFile('passport')){
                $destinationPath = public_path('assets/images/document');
                if(file_exists($destinationPath."/".$passport_doc->document_value)){
                    unlink($destinationPath."/".$passport_doc->document_value);
                }

                $file = $request->file('passport');
                $name = 'passport_'.time().'.'.$file->getClientOriginalExtension();
                $file->move($destinationPath, $name);
                $ext = $file->getClientOriginalExtension();

                Document::where('id',$passport_doc->id)->update([
                    "document_value" => $name,
                    "document_type"  => (!in_array($ext, array('.jpg','.png','.jpeg'))) ? 'image' : 'file'
                ]);
                $documentValue[] = "passport"; 
            }
            
        }else{
            $document = new Document();
            $document->document_key ='passport';
            if ($request->hasFile('passport')){
                $file = $request->file('passport');
                $name = 'passport_'.time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('assets/images/document');
                $file->move($destinationPath, $name);
                $ext = $file->getClientOriginalExtension();

                $document->document_value =$name;
                $document->document_type = (!in_array($ext, array('.jpg','.png','.jpeg'))) ? 'image' : 'file' ;
                $documentValue[] = "passport";
            }
            $document->user_id = $user->id;
            $document->save();
        }

        
        $certificate_doc = Document::where("user_id",auth()->user()->id)->where("document_key","certificate")->first();
        if($request->certificate && isset($certificate_doc->id)){
            if ($request->hasFile('certificate')){
                $destinationPath = public_path('assets/images/document');
                if(file_exists($destinationPath."/".$certificate_doc->document_value)){
                    unlink($destinationPath."/".$certificate_doc->document_value);
                }

                $file = $request->file('certificate');
                $name = 'certificate_'.time().'.'.$file->getClientOriginalExtension();
                $file->move($destinationPath, $name);
                $ext = $file->getClientOriginalExtension();

                Document::where('id',$certificate_doc->id)->update([
                    "document_value" => $name,
                    "document_type"  => (!in_array($ext, array('.jpg','.png','.jpeg'))) ? 'image' : 'file'
                ]);
                $documentValue[] = "certificate";
            }
        }else{
            $document = new Document();
            $document->document_key ='certificate';
            if ($request->hasFile('certificate')){
                $file = $request->file('certificate');
                $name = 'certificate_'.time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('assets/images/document');
                $file->move($destinationPath, $name);
                $ext = $file->getClientOriginalExtension();

                $document->document_value =$name;
                $document->document_type = (!in_array($ext, array('.jpg','.png','.jpeg'))) ? 'image' : 'file' ;
                $documentValue[] = "certificate";
            }
            $document->user_id=$user->id;
            $document->save();
        }

        $other_document_doc = Document::where("user_id",auth()->user()->id)->where("document_key","other_document")->first();
        if($request->other_document && isset($other_document_doc->id)){
            if ($request->hasFile('other_document')){
                $destinationPath = public_path('assets/images/document');
                if(file_exists($destinationPath."/".$other_document_doc->document_value)){
                    unlink($destinationPath."/".$other_document_doc->document_value);
                }

                $file = $request->file('other_document');
                $name = 'other_document_'.time().'.'.$file->getClientOriginalExtension();
                $file->move($destinationPath, $name);
                $ext = $file->getClientOriginalExtension();

                Document::where('id',$other_document_doc->id)->update([
                    "document_value" => $name,
                    "document_type"  => (!in_array($ext, array('.jpg','.png','.jpeg'))) ? 'image' : 'file'
                ]);
                $documentValue[] = "other_document";
            }
        }else{
            $document =new Document();
            $document->document_key = 'other_document';
            if ($request->hasFile('other_document')){
                $file = $request->file('other_document');
                $name = 'other_document_'.time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('assets/images/document');
                $file->move($destinationPath, $name);
                $ext = $file->getClientOriginalExtension();

                $document->document_value = $name;
                $document->document_type = (!in_array($ext, array('.jpg','.png','.jpeg'))) ? 'image' : 'file' ;
                $documentValue[] = "other_document";
            }
            $document->user_id = $user->id;
            $document->save();
        }

        if(!array_diff(array("passport","certificate","other_document"),$documentValue)){

            // $updateUser = User::where("id",auth()->user()->id)->update([
            //     "is_document" => 1
            // ]);
            $email = EmailNotification::get('admin_email')->first();
            $documents = Document::where('user_id',$user->id)->get();
            Mail::to($email->admin_email)->send(new NotifySuperAdminMail($user,$documents));
        }

        
        
        if($user){
            return response()->Json(['status' => '200','msg'=>'User Password Update successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }
    }

    public function updatePassword(Request $request){

        $this->validate($request,[
            'new_password' => ['required', 'string', 'min:8','confirmed'],
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
