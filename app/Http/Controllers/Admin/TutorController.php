<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Document;

use Mail;
use App\Mail\superadminApproveDocOfTutor;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','Tutor')->get();
        return view('admin/tutor/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function changeTutorStatus(Request $request){
        // dd($request->all());

        $users = User::find($request->user_id);
        $users->is_document = $request->status;
        $users->save();
        
        if($users){
            Mail::to($users->email)->send(new superadminApproveDocOfTutor($users));
            return response()->Json(['status' => '200','msg'=>'Status change successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userDocument = Document::where("user_id",$id)->get();
        return view('admin.tutor.show',compact('userDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/tutor/edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country_id' => ['required'],
            'institution' => ['required'],
            'city_institution' => ['required'],
            'state_institution' => ['required'],
            'country_institution' => ['required'],
            'specialization' => ['required'],
            'language_id' => ['required'],
        ]);

        $users = User::find($id);
        $users->first_name          = $request->first_name;
        $users->last_name           = $request->last_name;

        if($users->email == $request->email){
            $users->email = $request->email;
        }else{
            $users->is_google_meet = 0;
        }

        $users->country_id          = $request->country_id;
        $users->institution         = $request->institution;
        $users->city_institution    = $request->city_institution;
        $users->state_institution   = $request->state_institution;
        $users->country_institution = $request->country_institution;
        $users->specialization_id   = $request->specialization;
        $users->language_id         = $request->language_id;
        $users->save();

        if ($users) {
            return response()->Json(['status' => '200','msg'=>'Tutor Update Successfullay.']);
        }else{
            return response()->Json(['status' => '400','msg'=>'Something want wrong in sent Mail.']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        
        return redirect()->route('tutor.index')->with('success', 'Tutor Delete successfullay added.');
    }

}
