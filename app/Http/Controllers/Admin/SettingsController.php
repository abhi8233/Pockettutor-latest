<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Setting;


class SettingsController extends Controller
{
    

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
        $option = Setting::where("setting_key","stripe_payment_option")->first();
        $secret_key = Setting::where("setting_key","stripe_secret_key")->first();
        $public_key = Setting::where("setting_key","stripe_public_key")->first();

        return view('admin/settings/settingspayment',compact('option','secret_key','public_key'));
    }
    public function setSettingStripPayment(Request $request){
        // store strip payament

        $this->validate($request,[
            'setting_key'=>'required',
            'setting_value'=>'required',
        ]);

        
        if(isset($request->option_id) && !empty($request->option_id)){
            $setting = Setting::where("setting_key","stripe_payment_option")->update(["setting_value" => $request->option=='on'?'Enable':'Disable']);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'stripe_payment_option';
            $setting->setting_value = $request->option=='on'?'Enable':'Disable';
            $setting->save();
        }

        if(isset($request->key_id) && !empty($request->key_id)){
            $setting = Setting::where("setting_key","stripe_secret_key")->update(["setting_value" => $request->setting_key]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'stripe_secret_key';
            $setting->setting_value = $request->setting_key;
            $setting->save();
        }

        if(isset($request->public_id) && !empty($request->public_id)){
            $setting = Setting::where("setting_key","stripe_public_key")->update(["setting_value" => $request->setting_value]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'stripe_public_key';
            $setting->setting_value = $request->setting_value;
            $setting->save();
        }

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
    public function setSettingEmailTemplate(Request $request){
        // store email template
    }


    public function getSettingEmailNotification()
    {
        $admin_email = Setting::where("setting_key","notification_admin_email")->first();
        $sender_name = Setting::where("setting_key","notification_sender_name")->first();
        $sender_email = Setting::where("setting_key","notification_sender_email")->first();

        return view('admin/settings/settingsnotification',compact('admin_email','sender_name','sender_email'));
    }
    public function setSettingEmailNotification(Request $request){
        //store Email Notification
        $request->validate([  
            'admin_email' => 'required',
            'sender_name'       => 'required',
            'sender_email'          => 'required',
        ],
        [
            'admin_email.required' => 'Super Admin Email is required',
            'sender_name.required' => 'Sender Name is required',
            'sender_email.required' => 'Sender Email is required',
        ]);

        if(isset($request->admin_email_id) && !empty($request->admin_email_id)){
            $setting = Setting::where("setting_key","notification_admin_email")->update(["setting_value" => $request->admin_email]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'notification_admin_email';
            $setting->setting_value = $request->admin_email;
            $setting->save();
        }

        if(isset($request->sender_name_id) && !empty($request->sender_name_id)){
            $setting = Setting::where("setting_key","notification_sender_name")->update(["setting_value" => $request->sender_name]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'notification_sender_name';
            $setting->setting_value = $request->sender_name;
            $setting->save();
        }

        if(isset($request->sender_email_id) && !empty($request->sender_email_id)){
            $setting = Setting::where("setting_key","notification_sender_email")->update(["setting_value" => $request->sender_email]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'notification_sender_email';
            $setting->setting_value = $request->sender_email;
            $setting->save();
        }

        if($setting){
            return response()->Json(['status' => '200','msg'=>'Email Notification update successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
        }
    }



    public function getSettingMultiLanguage()
    {
        return view('admin/settings/settingslanguage');
    }
    public function setSettingMultiLanguage(Request $request){
        //store Email Notification

    }

    
    
    
}
