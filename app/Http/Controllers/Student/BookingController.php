<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Bookings;
use App\Models\User;
use App\Models\Specialization;
use App\Models\languages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
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
        $bookingslots= Bookings::with(['tutor','specialization'])->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
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
       $request->validate([  
            'specialization' => 'required',
            'language'       => 'required',
            'tutor_id'          => 'required',
            'date'              => 'required',
            'time'              => 'required'
        ],
        [
            'specialization.required' => 'Specialization is required',
            'language.required' => 'Language is required',
            'tutor_id.required' => 'Tutor is required',
            'date.required' => 'Date is required',
            'time.required' => 'Time is required',
        ]);

        $date_time = date("Y-m-d H:i:s",strtotime("$request->date $request->time"));
        

        $bookingslot = new Bookings;
        $bookingslot->tutor_id = $request->tutor_id;
        $bookingslot->specialization_id = $request->specialization;
        $bookingslot->language_id = $request->language;
        $bookingslot->date_time = $date_time;
        $bookingslot->user_id = auth()->user()->id;
        $bookingslot->save();

        if($bookingslot){
            return response()->Json(['status' => '200','msg'=>'Booking booked successfully.']);
        }else{
            return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
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
        // dd($request->specialization_id);
        if(isset($request->specialization_id) && isset($request->language_id)){
            $tutors = User::where(['specialization_id'=>$request->specialization_id,'language_id'=>$request->language_id,'role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();
        }else if(isset($request->specialization_id)){
            $tutors = User::where(['specialization_id'=>$request->specialization_id,'role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();
            
        }else if(isset($request->language_id)){
            $tutors = User::where(['language_id'=>$request->language_id,'role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();
        }else{
            $tutors = User::where(['role'=>'Tutor'])->orderBy('first_name', 'Asc')->get();
        }
       
        $html = '';
        if(count($tutors)){
            foreach ($tutors as $tutor) {
                $html .= '<div class="col-12 col-md-3">
                    <div class="d-flex flex-column justify-content-center align-items-center tutor-inner" id="'.$tutor->id.'">
                        <div class="profile-img">
                            <img src="../assets/images/profile.png" class="pt-width-px-88 pt-height-p-auto mb-1 tutor-img" />
                            <img src="../assets/images/flag.png" class="flag" />
                        </div>
                        <span class="tutor-name">'.$tutor->first_name .' '.$tutor->last_name.'</span>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </div>
                </div>';
            }
        }else{
             $html .= '<div class="col-12 col-md-6" style="color:red">No tutor found.</div>';
        }
        echo $html;
        
    }
}
