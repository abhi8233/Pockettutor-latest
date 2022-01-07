<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Setting;

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
    
}
