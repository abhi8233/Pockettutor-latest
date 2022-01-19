<?php

namespace App\Http\Controllers\Tutor;

use DateTime;
use DatePeriod;
use DateInterval;
use App\Models\TutorSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TutorSlotController extends Controller
{
    
    public function index(Request $request)
    {
        $TutorSlot=TutorSlot::where('tutor_id',Auth::id())->get()->whereBetween('slot_date',[explode("T",$request->start)[0],explode("T",$request->end)[0]]);
        $TutorSlotsList=[];
        foreach($TutorSlot as $item)
        {
            $all_day=date("Y-m-d",strtotime('+ 1 day',strtotime($item->slot_date)));
            $TutorSlotsList[]=[
                    "groupId"=>$item->id,
                    "title"=>$item->slot_note,
                    "start"=>$item->slot_date.'T'.$item->slot_start_time,
                    "end"=>$item->slot_end_time=="00:00:00"?$all_day.'T'.$item->slot_end_time:$item->slot_date.'T'.$item->slot_end_time,
            ];
        }
        return json_encode($TutorSlotsList);
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $input['tutor_id']=Auth::id();
        $TutorSlot_Match=TutorSlot::first();
        if($TutorSlot_Match)
        {
        
            $TutorSlot_match_with_date=$TutorSlot_Match->whereDate('slot_date',$request->slot_date)->where('tutor_id',Auth::id());
            if($TutorSlot_match_with_date->count() > 0 && $request->slot_start_time=="00:00:00" && $request->slot_end_time=="00:00:00")
            {
                if($request->slot_start_time!=$TutorSlot_match_with_date->first()->slot_start_time && $request->slot_end_time!=$TutorSlot_match_with_date->first()->slot_end_time)
                {
                    unset($input['_token']);
                    $TutorSlot_Match->whereDate('slot_date',$request->slot_date)->where('tutor_id',Auth::id())->forceDelete();
                    TutorSlot::create($input);
                }
                else
                {
                    $TutorSlot_match_with_date->forceDelete();
                }
            }
            else
            {

                $TutorSlot_match_start_time_with_date=$TutorSlot_Match->whereDate('slot_date',$request->slot_date)->where('tutor_id',Auth::id())
                ->whereTime('slot_start_time',$request->slot_start_time);

                $TutorSlot_match_start_end_time_with_date=$TutorSlot_Match->whereDate('slot_date',$request->slot_date)->where('tutor_id',Auth::id())
                ->whereTime('slot_start_time',$request->slot_start_time)->whereTime('slot_end_time',$request->slot_end_time);

                if($TutorSlot_match_start_end_time_with_date->count())
                {
                    $TutorSlot_match_start_end_time_with_date->forceDelete();
                }
                elseif($TutorSlot_match_start_time_with_date->count()>0)
                {
                    unset($input['_token']);
                    $TutorSlot_match_start_time_with_date->update($input);
                }
                else
                {
                    TutorSlot::create($input);
                }
            }
        }
        else
        {
            TutorSlot::create($input);
        }
        return true;
    }
    public function copy(Request $request)
    {
        $activeStartDate=explode("T",str_ireplace("\"","",$request->activeStartDate))[0];
        $activeEndDate=explode("T",str_ireplace("\"","",$request->activeEndDate))[0];
        
        $current_copyDateObject = $this->displayDates($activeStartDate,$activeEndDate);
       
        $start_date=date('Y-m-d',strtotime('-7 day', strtotime($activeStartDate)));
        $previus_copyDateObject = $this->displayDates($start_date,$activeStartDate);
        
        $TutorSlotArray=[];
        $i=1;
        foreach($previus_copyDateObject as $pc_date_item)
        {
            $TutorSlot=TutorSlot::where('tutor_id',Auth::id())->whereDate('slot_date',$pc_date_item)->orderBy('slot_date')->get();
           
            foreach($TutorSlot as $itemTutorSlot)
            {
                $input=$itemTutorSlot->toArray();
                $input['slot_date']=$current_copyDateObject[$i];
                TutorSlot::create($input);
            }
           $i++;
        }
        return true;
    }
    public function displayDates($date1, $date2, $format = 'Y-m-d' ) {
        $dates = array();
        $current = strtotime($date1);
        $date2 = strtotime($date2);
        while( $current <= $date2 ) {
           $dates[] = date($format, $current);
           $current = strtotime('+1 day', $current);
        }
        return collect($dates)->slice(1);
     }
}

