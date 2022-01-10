<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Bookings;
use App\Models\Specialization;
use App\Models\languages;

use Illuminate\Http\Request;

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
        return view('student/booking/index',compact('bookingslots'));
        
    }

    /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
    public function create()
    {
        // load the create form (app/views/student/booking/create.blade.php)
        $specializations= Specialization::orderBy('id','desc')->get();
        $languages= languages::orderBy('id','desc')->get();

        return View('student.booking.create',compact('specializations','languages'));
    }

     /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'tutor_id'          => 'required',
            'specialization_id' => 'required',
            'language_id'       => 'required',
            'date_time'         => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('booking/create')
                ->withErrors($validator);
        } else {
            // store
            $bookingslot=new Bookings;
            $bookingslot->tutor_id=  $request->input('tutor_id');
            $bookingslot->specialization_id= $request->input('specialization_id');
            $bookingslot->language_id= $request->input('language_id');
            $bookingslot->date_time= $request->input('date_time');
            $bookingslot->user_id= auth()->user()->id;
            $bookingslot->save();

            // redirect
            if($bookingslot){
                return response()->Json(['status' => 'success']);
            }else{
                return response()->Json(['status' => 'error']);
            }
        }
    }

    /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function show($id)
    {
        // get the booking
        $booking = Bookings::find($id);

        // show the view and pass the booking to it
        return View('student/booking/show',compact('booking'));
    }

    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function edit($id)
    {
        // get the booking
        $booking = Bookings::find($id);

        // show the edit form and pass the booking
        return View('student/booking/edit',compact('booking'));
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function update($id)
    {
        
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function destroy($id)
    {
        // delete
        $booking = Bookings::find($id);
        $booking->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the booking!');
        return Redirect::to('sbooking');
    }


}
