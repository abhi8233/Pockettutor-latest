<?php

namespace App\CustomClass;
namespace App\Http\Controllers\Student;

use Mail;
use App\Models\User;

use App\Models\Bookings;
use App\Models\Feedback;
use App\Models\UserPlan;
use App\CustomClass\Meet;
use App\Models\languages;
use App\Models\TutorSlot;
use Illuminate\Http\Request;

use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Mail\NotifyTutorBookingMail;

use Illuminate\Support\Facades\Auth;
use App\Mail\NotifyStudentBookingMail;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $bookingslots = Bookings::with(['tutor','specialization'])->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        // dd($bookingslots);
        return view('student.booking.index',compact('bookingslots'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([  
            'specialization' => 'required',
            'language'       => 'required',
            'tutor_id'          => 'required',
            'date'              => 'required',
            // 'time'              => 'required'
        ],
        [
            'specialization.required' => 'Specialization is required',
            'language.required' => 'Language is required',
            'tutor_id.required' => 'Tutor is required',
            'date.required' => 'Date is required',
            // 'time.required' => 'Time is required',
        ]);

        $activeDate = explode("T",str_ireplace("\"","",$request->date))[0];
        $start_date_time = date("Y-m-d H:i:s",strtotime("$activeDate".$request->slotList));
        $end_date_time = date("Y-m-d H:i:s",strtotime("$activeDate". $request->slotList ."+ 16 minute"));
        
        // dd($activeDate,$request->slotList[0],$start_date_time,$end_date_time);
        
        $this->meet = new Meet($request->tutor_id);
        
        if($this->meet->isCredentialLoaded() && $this->meet->isAppPermitted() ){
            $specialization_details = Specialization::find($request->specialization);
            $languages_details = languages::find($request->language[0]);
            
            $tutor_details = User::find($request->tutor_id);

            $event_details = $this->meet->createMeeting(
                array(
                    'title'         => $specialization_details->name,
                    'description'   => $languages_details->name,
                    // 'start'         => $start_date_time,
                    // 'end'           => $end_date_time,
                    'start'         => '2022-01-20T12:10:00-07:00',
                    'end'           => '2022-01-20T12:25:00-07:00',
                    'timezone'      => 'America/Los_Angeles',
                    'attendees'     => array($tutor_details->email,auth()->user()->email)
                )
            );
            

            $meetlink = $event_details['conference_link'];
            $event_id = $event_details['event_id'];

            $user_details = UserPlan::with(['subscription'])->where('user_id',auth()->user()->id)->where('is_active',1)->first();
            
            if($user_details->remaining_minutes == $user_details->subscription->minutes){
                return response()->Json(['status' => '401','msg' => 'You have no balance in you account.']);
            }

            $total_min = ($user_details->remaining_minutes == 0) ? $user_details->subscription->minutes :$user_details->remaining_minutes;
            $remaining = $total_min - 15;

            if($remaining == 0){
                UserPlan::where('id',$user_details->id)->update(['remaining_minutes' => $remaining,'is_active' => 0 ]);
            }else{

                UserPlan::where('id',$user_details->id)->update(['remaining_minutes' => $remaining ]);
            }
            

            $bookingslot = new Bookings;
            $bookingslot->tutor_id = $request->tutor_id;
            $bookingslot->specialization_id = $request->specialization;
            $bookingslot->language_id = $request->language[0];
            $bookingslot->date_time = $start_date_time;
            $bookingslot->user_id = auth()->user()->id;
            $bookingslot->google_link = $meetlink;
            $bookingslot->event_id = $event_id;
            $bookingslot->save();

            if($bookingslot){
                Mail::to(auth()->user()->email)->send(new NotifyStudentBookingMail($bookingslot));
                Mail::to($bookingslot->tutor->email)->send(new NotifyTutorBookingMail($bookingslot));
                if (Mail::failures()) {
                    return response()->Json(['status' => '400','msg' => 'Something want wrong in sent Mail .']);
                }else{
                    return response()->Json(['status' => '200','msg'=>'Booking booked successfully.']);
                }
            }else{
                return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
            }
        }else{
            return response()->Json(['status' => '500','msg' => 'google meet creadentials not found.']);
        }
    }

    

    public function CRUDOperation() {
        if(isset($_GET['action'])) {
            $now = time();
            $start_time = rand($now+86400, $now+(86400*6));
            $end_time = $start_time+3600;

            switch($_GET['action']) {
                case 'create' :
                    $this->meet->createMeeting(array(
                        'title'         => 'Title New ' . microtime(true),
                        'description'   => 'Description New ' . microtime(true),
                        'start'         => date("Y-m-d H:i:s", $start_time),
                        'end'           => date("Y-m-d H:i:s", $end_time),
                        'timezone'      => 'America/Los_Angeles'
                    ));
                    break;

                case 'delete' :
                    $this->meet->deleteMeeting($_GET['id']);
                    break;

                case 'update' :
                    $this->meet->updateMeeting($_GET['id'], array(
                        'title'         => 'Title Update ' . microtime(true),
                        'description'   => 'Description Update ' . microtime(true),
                        'start'         => date("Y-m-d H:i:s", $start_time),
                        'end'           => date("Y-m-d H:i:s", $end_time),
                        'timezone'      => 'America/Los_Angeles'
                    ));
                    break;
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTutor(Request $request)
    {
        
        $selectedDate = trim(preg_replace('/\s*\([^)]*\)/', '', $request->date));
        $slotDate = date('Y-m-d', strtotime($selectedDate));
        
        Session::put('specialization_id',$request->specialization_id);
        
        if(isset($request->specialization_id) && isset($slotDate) && isset($request->time) && isset($request->language_id)){
            $selectedTime = explode('-', $request->time);
            $slotTime = $selectedTime[0];

            $getTutorIds = TutorSlot::whereHas('tutor_user',function($query)use($request){
                    return $query->where('specialization_id',$request->specialization_id);
                
                })->whereDate('slot_date',$slotDate)->where('slot_start_time',$slotTime)->get(['tutor_id'])->toArray();
           

            $tutors = User::with(['languages'])->where([
                'is_document' => 1,
                'is_google_meet' => 1,
                'specialization_id' => $request->specialization_id,
                'language_id' => $request->language_id,
                'role' => 'Tutor'
            ])->whereIn('id',$getTutorIds)->orderBy('first_name', 'Asc')->get();

        
        }else if(isset($request->specialization_id) && isset($slotDate) && isset($request->time)){
           
            $getTutorIds = TutorSlot::whereHas('tutor_user',function($query)use($request){
                    return $query->where('specialization_id',$request->specialization_id);

                })->whereDate('slot_date',$slotDate)->where('slot_start_time',$request->time)->get(['tutor_id'])->toArray();

            $tutors = User::with(['languages'])->where([
                'is_document' => 1,
                'is_google_meet' => 1,
                'specialization_id' => $request->specialization_id,
                'role' => 'Tutor'
            ])->whereIn('id',$getTutorIds)->orderBy('first_name', 'Asc')->get();
        
        }else if(isset($request->specialization_id)){
            $tutors = User::with(['languages'])->where(['is_document' => 1,'is_google_meet' => 1,'specialization_id'=>$request->specialization_id,'role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();
       
        }else{
            $tutors = User::with(['languages'])->where(['is_document' => 1,'is_google_meet' => 1,'role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();

        }
       
        $html = '';
        if(count($tutors)){
            foreach ($tutors as $tutor) {
                $rating = Feedback::where('tutor_id',$tutor->id)->avg('rating');
                $rating = isset($rating) ? $rating : 0;
                $flag_url = asset('assets/images/'.$tutor->languages->flag);
               

                if(isset($request->rating)){
                    
                    if($request->rating == 0){
                        $html .= '<div class="col-12 col-md-3 mb-4" id="main_'.$tutor->id.'" rating="'.$rating.'">
                            <div class="d-flex flex-column justify-content-center align-items-center tutor-inner" id="'.$tutor->id.'">
                                <div class="profile-img">
                                    <img src="../assets/images/profile.png" class="pt-width-px-88 pt-height-p-auto mb-1 tutor-img" />
                                    <img src="'.$flag_url.'" class="flag" />
                                </div>
                                <span class="tutor-name">'.$tutor->first_name .' '.$tutor->last_name.'</span>
                                <div class="rate">
                                    <div id="starrate" class="starrate mt-3" data-val="'. $rating.'" data-max="5">
                                        <span class="ctrl"></span>
                                        <span class="cont m-1">';
                                        if ($rating == 0) {
                                            $html .= '<i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 0.5 && $rating > 0) {
                                            $html .= '<i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 1 && $rating > 0.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 1.5 && $rating > 1) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 2 && $rating > 1.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 2.5 && $rating > 2) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 3 && $rating > 2.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 3.5 && $rating > 3) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 4 && $rating > 3.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 4.5 && $rating > 4) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i>';
                                        }else if ($rating <= 5 && $rating > 4.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i>';
                                        }
                                        
                                        $html .= '</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }else if($request->rating != 0 && $rating!= 0 && $rating > $request->rating){
                        
                        $html .= '<div class="col-12 col-md-3 mb-4" id="main_'.$tutor->id.'" rating="'.$rating.'">
                            <div class="d-flex flex-column justify-content-center align-items-center tutor-inner" id="'.$tutor->id.'">
                                <div class="profile-img">
                                    <img src="../assets/images/profile.png" class="pt-width-px-88 pt-height-p-auto mb-1 tutor-img" />
                                    
                                    <img src="'.$flag_url.'" class="flag" />
                                </div>
                                <span class="tutor-name">'.$tutor->first_name .' '.$tutor->last_name.'</span>
                                <div class="rate">
                                    <div id="starrate" class="starrate mt-3" data-val="'. $rating.'" data-max="5">
                                        <span class="ctrl"></span>
                                        <span class="cont m-1">';
                                        if ($rating == 0) {
                                            $html .= '<i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 0.5 && $rating > 0) {
                                            $html .= '<i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 1 && $rating > 0.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 1.5 && $rating > 1) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 2 && $rating > 1.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 2.5 && $rating > 2) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 3 && $rating > 2.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 3.5 && $rating > 3) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 4 && $rating > 3.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                        }else if ($rating <= 4.5 && $rating > 4) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i>';
                                        }else if ($rating <= 5 && $rating > 4.5) {
                                            $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i>';
                                        }
                                        
                                        $html .= '</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }else if(!isset($request->rating)){
                    $html .= '<div class="col-12 col-md-3 mb-4" id="main_'.$tutor->id.'" rating="'.$rating.'">
                        <div class="d-flex flex-column justify-content-center align-items-center tutor-inner" id="'.$tutor->id.'">
                            <div class="profile-img">
                                <img src="../assets/images/profile.png" class="pt-width-px-88 pt-height-p-auto mb-1 tutor-img" />
                                <img src="'.$flag_url.'" class="flag" />
                            </div>
                            <span class="tutor-name">'.$tutor->first_name .' '.$tutor->last_name.'</span>
                            <div class="rate">
                                <div id="starrate" class="starrate mt-3" data-val="'. $rating.'" data-max="5">
                                    <span class="ctrl"></span>
                                    <span class="cont m-1">';
                                    if ($rating == 0) {
                                        $html .= '<i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                    }else if ($rating <= 0.5 && $rating > 0) {
                                        $html .= '<i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                    }else if ($rating <= 1 && $rating > 0.5) {
                                        $html .= '<i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                    }else if ($rating <= 1.5 && $rating > 1) {
                                        $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                    }else if ($rating <= 2 && $rating > 1.5) {
                                        $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                    }else if ($rating <= 2.5 && $rating > 2) {
                                        $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                    }else if ($rating <= 3 && $rating > 2.5) {
                                        $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                    }else if ($rating <= 3.5 && $rating > 3) {
                                        $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i><i class="far fa-fw fa-star"></i>';
                                    }else if ($rating <= 4 && $rating > 3.5) {
                                        $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="far fa-fw fa-star"></i>';
                                    }else if ($rating <= 4.5 && $rating > 4) {
                                        $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star-half-alt"></i>';
                                    }else if ($rating <= 5 && $rating > 4.5) {
                                        $html .= '<i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i><i class="fas fa-fw fa-star"></i>';
                                    }
                                    
                                    $html .= '</span>
                                </div>
                            </div>
                        </div>
                    </div>';
                }

            }

            if($html == ""){
                $html .= '<div class="col-12 col-md-6" style="color:red">No tutor found.</div>';
            }

        }else{
            $html .= '<div class="col-12 col-md-6" style="color:red">No tutor found.</div>';
        }
        echo $html;
        
    }
}
