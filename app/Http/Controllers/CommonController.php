<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bookings;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    
    public function getAccessToken(){
        // https://www.universal-tutorial.com/rest-apis/free-rest-api-for-country-state-city
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.universal-tutorial.com/api/getaccesstoken',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Accept:  application/json',
            'api-token: m-ThHJhdyCjsoTcX6SxZnh5Ey35Nr1ANW09jhIXotL3iuC_ApabCIN8LY2gUxqBPuqY',
            'user-email: rashmita.gangani.bi@gmail.com'
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response);
        
        return isset($response->auth_token) ? $response->auth_token : '';
    }

    public function getCountry(Request $request){
        $current_country_id = isset($request->current_country_id) ? $request->current_country_id :'';
        $input_name = isset($request->input_name) ? $request->input_name :'';
        $placeholder_name = isset($request->placeholder_name) ? $request->placeholder_name :'';

        $html = '';
        $accessToken = $this->getAccessToken();
        if($accessToken){
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www.universal-tutorial.com/api/countries',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$accessToken,
                'Accept:  application/json'
              ),
            )); 
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);

            $click_event = ($input_name != "country_id") ? 'onchange="getState(this)"':'';

            $html .= '<select class="form-control '.$input_name.' select2 " name="'.$input_name.'" id="'.$input_name.'" data-placeholder="'.$placeholder_name.'" '.$click_event.'>
                    <option value=""> '.$placeholder_name.'</option>';
            foreach ($response as $data) {
                $html .='<option value="'.$data->country_name.'" '.(($current_country_id == $data->country_name) ? "selected" : "" ).' >'.$data->country_name.'</option>';
            }
            $html .= '</select>';
        }
        
       return response()->json($html);
    }

    public function getStates(Request $request){
        $current_state_id = $request->current_state_id;
        $country_id = $request->country_id;

        $html = '';
        $accessToken = $this->getAccessToken();
        if($accessToken){
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www.universal-tutorial.com/api/states/'.$country_id,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$accessToken,
                'Accept: application/json',
                'Cookie: cf_ob_info=504:6ccc6dff5b988e1e:LHR; cf_use_ob=0'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            
            $html .= '<select class="form-control state_institution select2 " name="state_institution" id="state_institution" data-placeholder="Select State of Institution" onchange="getCity(this)">
                    <option value=""> Select State of Institution</option>';
            foreach ($response as $data) {
                $html .='<option value="'.$data->state_name.'" '.(($current_state_id == $data->state_name) ? "selected" : "" ).'>'.$data->state_name.'</option>';
            }
            $html .= '</select>';
        }
        return response()->json($html);
    }

    public function getCities(Request $request){
        $current_city_id = $request->current_city_id;
        $state_id = $request->state_id;

        $html = '';
        $accessToken = $this->getAccessToken();
        if($accessToken){
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www.universal-tutorial.com/api/cities/'.$state_id,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$accessToken,
                'Accept:  application/json'
              ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
                        
            $html .= '<select class="form-control city_institution select2 " name="city_institution" id="city_institution" data-placeholder="Select City of Institution" >
                    <option value=""> Select City of Institution</option>';
            foreach ($response as $data) {
                $html .='<option value="'.$data->city_name.'" '.(($current_city_id == $data->city_name) ? "selected" : "" ).' >'.$data->city_name.'</option>';
            }
            $html .= '</select>';
        }
        return response()->json($html);
    }

    
}
