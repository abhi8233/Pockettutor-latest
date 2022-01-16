<?php

namespace App\Providers;

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
        view()->composer('tutor.dashboard', function ($view) 
        {
            
           /*  $TutorSlot=TutorSlot::where('tutor_id',Auth::id())->get();
            $TutorSlotsList=[];
            foreach($TutorSlot as $item)
            {
                $TutorSlotsList[]=[
                        "groupId"=>999,
                        "title"=>$item->slot_note,
                        "start"=>$item->slot_date.'T'.$item->slot_start_time,
                        "end"=>$item->slot_date.'T'.$item->slot_end_time,
                ];
            } */
            // dd($TutorSlotsList);
            // $view->with(['TutorSlotsList'=>collect($TutorSlotsList)->toArray()]);    
            // dd($myClientList,auth()->user());
        });  
    }
}
