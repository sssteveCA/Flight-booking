<?php

namespace App\Http\Controllers\api\welcome;

use App\Interfaces\Constants as C;
use App\Classes\Welcome\FlightPrice;
use App\Exceptions\FlightsArrayException;
use App\Exceptions\FlightsDataModifiedException;
use App\Exceptions\FlightsTempNotAddedException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\welcome\FlightSearchController;
use App\Http\Requests\api\welcome\FlightPriceRequestApi;
use App\Interfaces\Paths as P;
use App\Traits\Common\FlightSearchCommonTrait;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class FlightSearchControllerApi extends Controller
{
    use FlightSearchCommonTrait;
    
    public function getFlightPrice(FlightPriceRequestApi $request){
        $flights = [];
        //Log::channel('stdout')->info('getFlightPrice method');
        $inputs = $request->validated();
        //Log::channel('stdout')->info("getFlightPrice inputs => ".var_export($inputs,true));
        $flight_type = $inputs['flight_type'];
        //Log::channel('stdout')->info("getFlightPrice flight_type => {$flight_type}");
        try{
            if($flight_type == 'roundtrip'){
                $data_outbound = $this->setFlightPriceArray($inputs,'roundtrip_outbound');
                //Log::channel('stdout')->info("data outbound array => ".var_export($data_outbound,true));
                $fl_outbound = new FlightPrice($data_outbound);
                //Log::channel('stdout')->info("fl outbound errno => ".$fl_outbound->getErrno());
                $data_return = $this->setFlightPriceArray($inputs,'roundtrip_return');
                //Log::channel('stdout')->info("data return array => ".var_export($data_return,true));
                $fl_return = new FlightPrice($data_return);
                //Log::channel('stdout')->info("fl return errno => ".$fl_return->getErrno());
                $flights = $this->roundtripFlights($fl_outbound,$fl_return);
            }
            else if($flight_type = 'oneway'){
                $data_oneway = $this->setFlightPriceArray($inputs,'oneway');
                $fl_oneway = new FlightPrice($data_oneway);
                $flights = $this->onewayFlight($fl_oneway);
            }
            $ft_flights = ['flights' => $flights];
            $add_temp = $this->setFlightsTemp($ft_flights);
            if(!$add_temp){
                $errno = $this->ftm->getErrno();
                $error = $this->ftm->getError();
                throw new FlightsTempNotAddedException($error,$errno);
            }
            $response_array = [
                C::KEY_STATUS => 'OK',
                'session_id' => $this->ftm->getSessionId(),
                'flight_type' => $flight_type,
                //'inputs' => $inputs,
                'flights' => $flights
            ];
            //$response_json = json_encode($response_array,JSON_PRETTY_PRINT);
            //Log::channel('stdout')->info("FlightSearchControllerApi getFlightPrice response => ".var_export($response_array,true));
            //Log::channel('stdout')->info("FlightSearchControllerApi getFlightPrice response => ".var_export($response_json,true));
            return response()->json($response_array,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(\Exception $e){
            $error = $e->getMessage();
            //Log::channel('stdout')->error("Flight search controller exception => ".var_export($error,true));
            $error = C::ERR_REQUEST;
            return response()->json([
                C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => $error
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }
}
