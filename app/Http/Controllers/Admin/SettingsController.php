<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
}
