<?php

namespace App\Http\Controllers\Tutor;

use DateTime;
use DatePeriod;
use DateInterval;
use App\Models\User;
use App\Models\Bookings;
use App\Models\TutorSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TutorSlotController extends Controller
{
    
    public function index(Request $request)
    {
		$is_lifetime_slot=User::where('id',auth()->user()->id)->pluck('is_lifetime_slot')->first();
        if($is_lifetime_slot)
		{
			
			
			$activeStartDate=date("Y-m-d",strtotime("-1 day",strtotime(explode("T",$request->start)[0])));
			$activeEndDate=date("Y-m-d",strtotime("-1 day",strtotime(explode("T",$request->end)[0])));
			
			$current_copyDateObject = $this->displayDates($activeStartDate,$activeEndDate);
		   
			$start_date_a=date('Y-m-d',strtotime('-7 day', strtotime($activeStartDate)));
			$previus_copyDateObject = $this->displayDates($start_date_a,$activeStartDate);
			
			
			
			$i=1;
			foreach($previus_copyDateObject as $pc_date_item){

				$itemTutorSlot=TutorSlot::where('tutor_id',Auth::id())->whereDate('slot_date',$pc_date_item)->get();
				
				foreach($itemTutorSlot as $item)
				{
					
					$input=collect($item)->toArray();
					$input['slot_date']=$current_copyDateObject[$i];
					// dd($input,$item,$current_copyDateObject,$itemTutorSlot,$start_date_a,$previus_copyDateObject,$pc_date_item);
					$TutorSlotExsits = TutorSlot::with('tutor_user')
					->where('tutor_id',Auth::id())
					->whereDate('slot_date',$input['slot_date'])->where('slot_start_time',$item->slot_start_time)->where('slot_end_time',$item->slot_end_time)->count();
					// dd(Auth::id(),$input['slot_date'],$TutorSlotExsits,$item->slot_end_time,$item->slot_start_time,empty($itemTutorSlot),$itemTutorSlot,$is_lifetime_slot,$current_copyDateObject,$previus_copyDateObject);	
					if($TutorSlotExsits==0)
					{
						TutorSlot::create($input);
					}
				}
				
			   $i++;
			}
			
		}
		$start_date=explode("T",$request->start)[0];
		$end_date=explode("T",$request->end)[0];
		
        $TutorSlot = TutorSlot::with('tutor_user')
        ->where('tutor_id',Auth::id())
        ->whereBetween('slot_date',[$start_date,$end_date])->get();
        $TutorSlotsList=[];
        foreach($TutorSlot as $item){
            $all_day=date("Y-m-d",strtotime('+ 1 day',strtotime($item->slot_date)));
            $TutorSlotsList[]=[
                    "groupId"=>$item->id,
                    // "title"=>$item->slot_note,
                    "start"=>$item->slot_date.'T'.$item->slot_start_time,
                    "end"=>$item->slot_end_time=="00:00:00"?$all_day.'T'.$item->slot_end_time:$item->slot_date.'T'.$item->slot_end_time,
            ];
        }
        return json_encode($TutorSlotsList);
    }
    public function no_available_slot(Request $request)
    {
		// return $request->all();
        $specialization_id=Session::get('specialization_id');
        if(!isset($specialization_id))
        {
            return [];
        }
        // return $request->all();
        $period = new DatePeriod(
            new DateTime(date("Y-m-d")),
            new DateInterval('P1D'),
            new DateTime(date("Y-m-d",strtotime("+2.5 month",strtotime(date("Y-m-d")))))
        );
		// return [explode("T",$request->start)[0],explode("T",$request->end)[0],date("Y-m-d"),date("Y-m-d",strtotime("+2 month",strtotime(date("Y-m-d"))))];
		
        $TutorSlot = TutorSlot::with('tutor_user')
        ->whereHas('tutor_user',function($query)use($specialization_id){
            if(isset($specialization_id))
            {            
                return $query->where('specialization_id',$specialization_id);
            }
            
        })
        ->whereBetween('slot_date',[date("Y-m-d"),date("Y-m-d",strtotime("+2 month",strtotime(date("Y-m-d"))))])
        ->groupBy('slot_date')
        ->pluck('slot_date')->toArray();
        
        foreach ($period as $key => $value) {
            if(!in_array($value->format('Y-m-d'),$TutorSlot))
            {
				$itemTutorSlot=TutorSlot::where('tutor_id',Auth::id())->whereDate('slot_date',$value->format('Y-m-d'))->first();
				if(!isset($itemTutorSlot))
				{
					$TutorSlotsList[]=[
							"groupId"=>$key,
							"title"=>"No Slot Available",
							// "title"=>$value->format('Y-m-d'),
							"start"=>$value->format('Y-m-d'),
							// "end"=>$item->slot_end_time=="00:00:00"?$all_day.'T'.$item->slot_end_time:$item->slot_date.'T'.$item->slot_end_time,
					];
				}
            }
        }
        return json_encode($TutorSlotsList);

        
        // ->toSql();
        // dd($TutorSlot,$specialization_id,[explode("T",$request->start)[0],explode("T",$request->end)[0]]);
      
        $TutorSlotsList=[];
        foreach($TutorSlot as $item){
            $all_day=date("Y-m-d",strtotime('+ 1 day',strtotime($item->slot_date)));
            $TutorSlotsList[]=[
                    "groupId"=>$item->id,
                    "title"=>"No Slot Available",
                    "start"=>$item->slot_date,
                    // "end"=>$item->slot_end_time=="00:00:00"?$all_day.'T'.$item->slot_end_time:$item->slot_date.'T'.$item->slot_end_time,
            ];
        }
        return json_encode($TutorSlotsList);
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $input['tutor_id']=Auth::id();
        $TutorSlot_Match=TutorSlot::first();
        if($TutorSlot_Match){
        
            $TutorSlot_match_with_date=$TutorSlot_Match->whereDate('slot_date',$request->slot_date)->where('tutor_id',Auth::id());
            if($TutorSlot_match_with_date->count() > 0 && $request->slot_start_time=="00:00:00" && $request->slot_end_time=="00:00:00"){

                if($request->slot_start_time != $TutorSlot_match_with_date->first()->slot_start_time && $request->slot_end_time != $TutorSlot_match_with_date->first()->slot_end_time){
                    unset($input['_token']);
                    $TutorSlot_Match->whereDate('slot_date',$request->slot_date)->where('tutor_id',Auth::id())->forceDelete();
                    TutorSlot::create($input);
                }else{
                    $TutorSlot_match_with_date->forceDelete();
                }
            }else{

                $TutorSlot_match_start_time_with_date=$TutorSlot_Match->whereDate('slot_date',$request->slot_date)->where('tutor_id',Auth::id())
                ->whereTime('slot_start_time',$request->slot_start_time);

                $TutorSlot_match_start_end_time_with_date=$TutorSlot_Match->whereDate('slot_date',$request->slot_date)->where('tutor_id',Auth::id())
                ->whereTime('slot_start_time',$request->slot_start_time)->whereTime('slot_end_time',$request->slot_end_time);

                if($TutorSlot_match_start_end_time_with_date->count()){
                    $TutorSlot_match_start_end_time_with_date->forceDelete();

                }elseif($TutorSlot_match_start_time_with_date->count()>0){
                    unset($input['_token']);
                    $TutorSlot_match_start_time_with_date->update($input);

                }else{
                    TutorSlot::create($input);

                }
            }
        }else{
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
        foreach($previus_copyDateObject as $pc_date_item){

            $TutorSlot=TutorSlot::where('tutor_id',Auth::id())->whereDate('slot_date',$pc_date_item)->orderBy('slot_date')->get();
           
            foreach($TutorSlot as $itemTutorSlot){

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

    public function slots_list_by_date(Request $request)
    {
        // return $request->all();
        $activeDate=date("Y-m-d");
        if(isset($request->activeDate))
        {
            $activeDate = explode("T",str_ireplace("\"","",$request->activeDate))[0];
        }
        $TutorSlotList = TutorSlot::with('tutor_user')
        ->whereHas('tutor_user',function($query)use($request){
            return $query->where('specialization_id',$request->specialization_id);
            
        })->whereDate('slot_date',$activeDate)->orderBy('slot_date')->groupBy('slot_start_time')
        ->get();
        // ->toSql();
        
        $slotList=[];
        foreach($TutorSlotList as $slotItem){
            $status=$request->slot_time==$slotItem->slot_start_time?"checked":"";
            $slotList[]='
            <label class="col-md-4 col-sm-6">
                <input type="radio" name="slotList" value="'.$slotItem->slot_start_time.'" '.$status.'>
                <span>
                '.date("H:i A",strtotime($slotItem->slot_start_time)).'
                </span>
            </label>';
        }
        return count($slotList) > 0 ? $slotList : "<h3 class='mb-3'>Slot Not Found</h3>";

    }
    public function change_booking_status(Request $request)
    {
        Bookings::where('id',$request->booking_id)->update(['meeting_status'=>1,'is_feedback'=>1]);
        return 1;
    } 
	public function is_lifetime_slot()
    {
		
		$is_lifetime_slot=User::where('id',auth()->user()->id)->pluck('is_lifetime_slot')->first();
        User::where('id',auth()->user()->id)->update(['is_lifetime_slot'=>$is_lifetime_slot?0:1]);
        return $is_lifetime_slot?0:1;
    }
}

