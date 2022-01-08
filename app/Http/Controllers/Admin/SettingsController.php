<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\EmailNotification;

class SettingsController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin/settings/index');
    }
    public function settingstemplate()
    {
        return view('admin/settings/settingstemplate');
    }
    public function settingsnotification()
    {
        return view('admin/settings/settingsnotification');
    }
    public function settingslanguage()
    {
        return view('admin/settings/settingslanguage');
    }
    public function stripesetting(Request $request)
    {
        $this->validate($request,['setting_key'=>'required',
            'setting_value'=>'required',
    ]);
        $setting=new Setting();
        $setting->setting_key=$request->setting_key;
        $setting->setting_value=$request->setting_value;

        $setting->status=$request->status=='on'?'Active':'Inactive';
        $setting->save();
        return redirect()->back();
    }

    public function addnotification(Request $request)
    {
        $request->validate([  
        'admin_email' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);  

        $email_notification=new EmailNotification();
        $email_notification->admin_email=$request->admin_email;
        $email_notification->name=$request->name;

        $email_notification->email=$request->email;
        $email_notification->save();
        return redirect()->back()->with('success', 'Email Notification successfullay added.');   
    }
    
}
