<?php

namespace App\Providers;

use App\Models\Bookings;
use App\Models\UserPlan;
use App\Models\TutorSlot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('student.booking.index', function ($view) 
        {
            $user_details = UserPlan::with(['subscription'])->where('user_id',Auth::id())->where('is_active',1)->first();
            $totalRemainingMinutes=$user_details->subscription->minutes-$user_details->remaining_minutes;
            $view->with(['totalRemainingMinutes'=>$totalRemainingMinutes]);    
        });  
        view()->composer('tutor.dashboard', function ($view) 
        {
            $totalMeetingHours=Bookings::where('tutor_id',Auth::id())->where('meeting_status',1)->count();
            $view->with(['totalMeetingHours'=>date("H:i",$totalMeetingHours*strtotime("0:30:00"))]);    
        });  
    }
}
