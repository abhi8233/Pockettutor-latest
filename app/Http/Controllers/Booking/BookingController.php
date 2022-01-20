<?php
namespace App\CustomClass;
namespace App\Http\Controllers\Booking;

use App\CustomClass\Meet;
use App\Http\Controllers\Controller;

// use App\Models\Bookings;
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
        
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specializations= Specialization::orderBy('id','desc')->get();
        $languages= languages::orderBy('id','desc')->get();
        // dd($languages);
        return view('booking.index',compact('specializations','languages'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->meet = new Meet(auth()->user()->id);
        if(!$this->meet->isCredentialLoaded()){
            // dd("credential");
            return view('booking.create');
        } else if(!$this->meet->isAppPermitted()){
            // dd("url");
            $url = $this->meet->get_consent_screen_url();
            // return redirect()->route('booking.edit',compact('url'));
            return view('booking.edit',compact('url'));
        } else {
            $updateUser = User::where("id",auth()->user()->id)->update([
                "is_google_meet" => 1
            ]);
            return redirect()->route('tprofile');
            // $meetings = $this->meet->getMeetingList();

            // if(!count($meetings)) {
            //     echo '<p>No meeting found</p>';
            // } else {
            //     echo '<table border="1" style="border-collapse: collapse;"><tbody>';
            //     foreach($meetings as $meeting) {
            //         echo '<tr>
            //             <td>' . $meeting['title'] . '</td>
            //             <td>' . $meeting['meeting_link'] . '</td>
            //             <td>' . $meeting['start'] . '</td>
            //             <td><a href="?action=delete&id='.$meeting['id'].'">Delete</a></td>
            //             <td><a href="?action=update&id='.$meeting['id'].'">Update with Random Data</a></td>
            //         </tr>';
            //     }
            //     echo '</tbody></table>';
            // } 

            ?>
            <!-- <a href="?action=create">Create Meeting with Random Data</a> -->
            <?php
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->meet = new Meet(auth()->user()->id);
        if(isset($_FILES['credential']) && $_FILES['credential']['error']==0) {

            // Save credential file if exist and no error
            $data = $this->meet->saveCredential($_FILES['credential']);
            if($data){
                return response()->Json(['status' => '200','msg'=>'Booking booked successfully.']);
            }else{
                return response()->Json(['status' => '400','msg' => 'Something want wrong.']);
            }
        }
    
    }

    public function saveToken() {
        $this->meet = new Meet(auth()->user()->id);
        if(isset($_GET['code'])) {

            $this->meet->saveToken($_GET['code']);
            return redirect()->route('booking.create');
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

}
