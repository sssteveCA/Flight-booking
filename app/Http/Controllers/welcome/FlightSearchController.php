<?php

namespace App\Http\Controllers\welcome;

use App\Classes\Welcome\FlightPrice;
use App\Exceptions\FlightsTempNotAddedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\welcome\FlightPriceRequest;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Traits\Common\FlightSearchCommonTrait;
use Illuminate\Http\Exceptions\HttpResponseException;



class FlightSearchController extends Controller
{
    use FlightSearchCommonTrait;

    /**
     * Get the flight based on input data
     * @param FlightPriceRequest
     */
    public function getFlightPrice(FlightPriceRequest $request){
        $flights = [];
        $inputs = $request->validated();
        $flight_type = $inputs['flight_type'];
        try{
            if($flight_type == 'roundtrip'){
                $data_outbound = $this->setFlightPriceArray($inputs,'roundtrip_outbound');
                $fl_outbound = new FlightPrice($data_outbound);
                $data_return = $this->setFlightPriceArray($inputs,'roundtrip_return');
                $fl_return = new FlightPrice($data_return);
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
            return response()->view(P::VIEW_FLIGHTPRICERESULT,[
                'response' => [
                    'session_id' => $this->ftm->getSessionId(),
                    'flight_type' => $flight_type,
                    'inputs' => $inputs, 
                    'flights' => $flights
                ]   
            ],200);
        }catch(\Exception $e){
            $error = $e->getMessage();
            $errors_array = [ C::ERR_REQUEST];
            throw new HttpResponseException(
                response()->view(P::VIEW_FLIGHTPRICERESULT,['errors_array' => $errors_array],400)
                /* response()->json(['errors' => $errors],422,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_SLASHES) */
            );
        }
    }

    /**
     * Redirect the user to the flight price result page if came from login page after seen the price but he was not logged
     */
    public function getFlightPrice_get(){
        $response = session()->get('response');
        return response()->view(P::VIEW_FLIGHTPRICERESULT,[
            'response' => [
                'session_id' => $response['session_id'],
                'flight_type' => $response['flight_type'],
                'inputs' => $response['inputs'], 
                'flights' => $response['flights']
            ]   
        ],200);
    }

}
