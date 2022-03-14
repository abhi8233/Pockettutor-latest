<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\EmailTemplate;

use Mail;
use App\Mail\NotifyUserSubscriptionPlanMail;

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
        $tags = array('first_name','last_name','email','booking_date_time');

        $templates = EmailTemplate::get();
		
		
		// Mail::to("satyamv2121@gmail.com")->send(new NotifyUserSubscriptionPlanMail(auth()->user()));
		
        return view('admin/settings/settingstemplate',compact('tags','templates'));
    }
    public function setSettingEmailTemplate(Request $request){
        // store email template
		
       $request->validate([  
            'subject'   => 'required',
            'message'   => 'required',
			'tag_name'=> "required"
        ]
		);



        $subject = $request->subject;
        $message = $request->message;
        $role = $request->role;
        $tag_name = $request->tag_name;
        $status = "D";
        if($request->status == "on")
            $status = "E";

        if(isset($request->id) && !empty($request->id)){
            $emailtemplate = EmailTemplate::where("id",$request->id)->update([
                "subject" => $subject,
                "message" => htmlentities($message),
                "status" => $status,
                "tag_name" => $tag_name,
            ]);
        }else{
            $emailtemplate = new EmailTemplate();
            $emailtemplate->subject = $subject;
            $emailtemplate->message = htmlentities($message);
            $emailtemplate->role = $role;
            $emailtemplate->status = $status;
            $emailtemplate->tag_name = $tag_name;
            $emailtemplate->save();
        }

        return redirect()->back();
    }
	public function createEmailTemplate(Request $request){
        // store email template
		// return $request->all();
        $request->validate([  
            'subject'   => 'required',
            'message'   => 'required',
			'tag_name'=> "required"
        ]
		);


        $subject = $request->subject;
        $message = $request->message;
        $role = $request->role;
        $tag_name = $request->tag_name;
        $status = "D";
        if($request->status == "on")
		{
            $status = "E";
		}
	
		$emailtemplate = new EmailTemplate();
		$emailtemplate->subject = $subject;
		$emailtemplate->message = htmlentities($message);
		$emailtemplate->role = $role;
		$emailtemplate->status = $status;
		$emailtemplate->tag_name = $tag_name;
		$emailtemplate->save();
 
        return redirect()->back();
    }

	public function deleteEmailTemplate($id)
	{
		EmailTemplate::where('id',$id)->delete();
		return redirect()->back();
	}
    public function getSettingEmailNotification()
    {
        $admin_email = Setting::where("setting_key","notification_admin_email")->first();
        $sender_name = Setting::where("setting_key","notification_sender_name")->first();
        $sender_email = Setting::where("setting_key","notification_sender_email")->first();

        $smtp_host = Setting::where("setting_key","smtp_host")->first();
        $smtp_username = Setting::where("setting_key","smtp_username")->first();
        $smtp_password = Setting::where("setting_key","smtp_password")->first();
        $smtp_port = Setting::where("setting_key","smtp_port")->first();
        $encryption = Setting::where("setting_key","encryption")->first();

        return view('admin/settings/settingsnotification',compact('admin_email','sender_name','sender_email','smtp_host','smtp_username','smtp_password','smtp_port','encryption'));
    }
    public function setSettingEmailNotification(Request $request){
        //store Email Notification
        $request->validate([  
            'admin_email'   => 'required',
            'sender_name'   => 'required',
            'sender_email'  => 'required',
            'smtp_host'     => 'required',
            'smtp_username' => 'required',
            'smtp_password' => 'required',
            'smtp_port'     => 'required',
            'encryption'    => 'required',
        ],
        [
            'admin_email.required' => 'Super Admin Email is required',
            'sender_name.required' => 'Sender Name is required',
            'sender_email.required' => 'Sender Email is required',
            'smtp_host.required' => 'SMTP Host is required',
            'smtp_username.required' => 'SMTP User Name is required',
            'smtp_password.required' => 'SMTP Password is required',
            'smtp_port.required' => 'SMTP Port is required',
            'encryption.required' => 'Encryption is required',
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


        if(isset($request->smtp_host_id) && !empty($request->smtp_host_id)){
            $setting = Setting::where("setting_key","smtp_host")->update(["setting_value" => $request->smtp_host]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'smtp_host';
            $setting->setting_value = $request->smtp_host;
            $setting->save();
        }

        if(isset($request->smtp_username_id) && !empty($request->smtp_username_id)){
            $setting = Setting::where("setting_key","smtp_username")->update(["setting_value" => $request->smtp_username]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'smtp_username';
            $setting->setting_value = $request->smtp_username;
            $setting->save();
        }

        if(isset($request->smtp_password_id) && !empty($request->smtp_password_id)){
            $setting = Setting::where("setting_key","smtp_password")->update(["setting_value" => $request->smtp_password]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'smtp_password';
            $setting->setting_value = $request->smtp_password;
            $setting->save();
        }

        if(isset($request->smtp_port_id) && !empty($request->smtp_port_id)){
            $setting = Setting::where("setting_key","smtp_port")->update(["setting_value" => $request->smtp_port]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'smtp_port';
            $setting->setting_value = $request->smtp_port;
            $setting->save();
        }
        
        if(isset($request->encryption_id) && !empty($request->encryption_id)){
            $setting = Setting::where("setting_key","encryption")->update(["setting_value" => $request->encryption]);
        }else{
            $setting = new Setting();
            $setting->setting_key = 'encryption';
            $setting->setting_value = $request->encryption;
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
