<?php

namespace App\Http\Controllers\bookflight;

use App\Http\Controllers\Controller;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

//This controller is used to allow users to book flights that previously have not been payed
class ResumeBookFlightController extends Controller
{
    //
    public function resumeFlight(Request $request){
        //If flight_id input exists and it's not empty
        $response_data = [
            'done' => false,
            'message' => '',
            'flights' => [],
            'code' => 400
        ];
        if($request->filled('flight_id')){
            $flight_id = $request->input('flight_id');
            $flight = Flight::find($flight_id);
            $response_data = $this->setResponseData($flight);
            Log::channel('stdout')->debug("ResumeBookFlightController resumeFlight response_data => ");
            Log::channel('stdout')->debug(var_export($response_data,true));
        }//if($request->filled('flight_id')){
        else
            $response['message'] = C::ERR_MISSEDDATA;
        return response()->view(P::VIEW_BOOKFLIGHT,$response_data,$response_data['code']);
    }

    private function setResponseData(Flight $flight): array{
        $response_data = [];
        $response_data['done'] = false;
        $response_data['message'] = '';
        $flight_array = [];
        if($flight != null){
            $user_id = auth()->id();
            //Check if logged user can access to this resource
            if($user_id == $flight->user_id){
                $flight_array = [
                    'id' => $flight->id,
                    'name' => "Da {$flight->departure_airport} a {$flight->arrival_airport}",
                    'total_price' => $flight->total_price
                ];
                $response_data['code'] = 200; //OK
                $response_data['done'] = true;
            }//if($user_id == $flight->user_id){
            else
                $response_data['code'] = 401; //Unauthorized
        }//if($flight != null){
        else 
            $response_data['code'] = 404; //Not found
        $response_data['flights'][] = $flight_array;
        if($response_data['done'] === false)
            $response_data['message'] = C::ERR_URLNOTFOUND_NOTALLOWED;
        return $response_data;
    }
}
