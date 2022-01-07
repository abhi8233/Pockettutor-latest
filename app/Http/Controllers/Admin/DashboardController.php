<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users=User::where('role','Student')->get();
        return view('admin/dashboard',compact('users'));
    }
    
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin_dashboard');
    }
}
