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
        //
    }


    public function getSettingStripPayment()
    {
        return view('admin/settings/settingspayment');
    }
    public function setSettingStripPayment(){
        // store strip payament

        $this->validate($request,['setting_key'=>'required',
            'setting_value'=>'required',
        ]);

        $setting=new Setting();
        $setting->setting_key='stripe payment option';
        $setting->setting_value=$request->option=='on'?'Enable':'Disable';
        $setting->save();

        $setting=new Setting();
        $setting->setting_key='stripe secret key';
        $setting->setting_value=$request->setting_key;
        $setting->save();

        $setting=new Setting();
        $setting->setting_key='stripe public key';
        $setting->setting_value=$request->setting_value;
        $setting->save();

        if($setting){
            return response()->Json(['status' => '200','msg'=>'Stripe Setting added successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }
    }


    public function getSettingEmailTemplate()
    {
        return view('admin/settings/settingstemplate');
    }
    public function setSettingEmailTemplate(){
        // store email template
    }


    public function getSettingEmailNotification()
    {
        return view('admin/settings/settingsnotification');
    }
    public function setSettingEmailNotification(){
        //store Email Notification
        $request->validate([  
            'admin_email' => 'required',
            'name'       => 'required',
            'email'          => 'required',
        ],
        [
            'admin_email.required' => 'Super Admin Email is required',
            'name.required' => 'Sender Name is required',
            'email.required' => 'Sender Email is required',
        ]);

        $email_notification=new EmailNotification();
        $email_notification->admin_email=$request->admin_email;
        $email_notification->name=$request->name;

        $email_notification->email=$request->email;
        $email_notification->save();
        if($email_notification){
            return response()->Json(['status' => '200','msg'=>'Email Notification added successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }
    }



    public function getSettingMultiLanguage()
    {
        return view('admin/settings/settingslanguage');
    }
    public function setSettingMultiLanguage(){
        //store Email Notification

    }

    
    // public function stripesetting(Request $request)
    // {
    //     $this->validate($request,['setting_key'=>'required',
    //         'setting_value'=>'required',
    //     ]);

    //     $setting=new Setting();
    //     $setting->setting_key='stripe payment option';
    //     $setting->setting_value=$request->option=='on'?'Enable':'Disable';
    //     $setting->save();

    //     $setting=new Setting();
    //     $setting->setting_key='stripe secret key';
    //     $setting->setting_value=$request->setting_key;
    //     $setting->save();

    //     $setting=new Setting();
    //     $setting->setting_key='stripe public key';
    //     $setting->setting_value=$request->setting_value;
    //     $setting->save();

    //     if($setting){
    //         return response()->Json(['status' => '200','msg'=>'Stripe Setting added successfully.']);
    //     }else{
    //         return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
    //     }
    // }

    // public function addnotification(Request $request)
    // {  
        
    // }
    
}
