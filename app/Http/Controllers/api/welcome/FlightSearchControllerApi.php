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
        Log::channel('stdout')->info("getFlightPrice inputs => ".var_export($inputs,true));
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
                $flights = [
                    'outbound' => [
                        'company_name' => $fl_outbound->company_name,
                        'departure_country' => $fl_outbound->departure_country,
                        'departure_airport' => $fl_outbound->departure_airport,
                        'booking_date' => date('Y-m-d'),
                        'flight_date' => $fl_outbound->flight_date,
                        'flight_time' => $fl_outbound->flight_time,
                        'arrival_country' => $fl_outbound->arrival_country,
                        'arrival_airport' => $fl_outbound->arrival_airport,
                        'adults' => $fl_outbound->adults,
                        'teenagers' => $fl_outbound->teenagers,
                        'children' => $fl_outbound->children,
                        'newborns' => $fl_outbound->newborns,
                        'flight_price' => $fl_outbound->flight_price_format
                    ],
                    'return' => [
                        'company_name' => $fl_return->company_name,
                        'departure_country' => $fl_return->departure_country,
                        'departure_airport' => $fl_return->departure_airport,
                        'booking_date' => date('Y-m-d'),
                        'flight_date' => $fl_return->flight_date,
                        'flight_time' => $fl_return->flight_time,
                        'arrival_country' => $fl_return->arrival_country,
                        'arrival_airport' => $fl_return->arrival_airport,
                        'adults' => $fl_return->adults,
                        'teenagers' => $fl_return->teenagers,
                        'children' => $fl_return->children,
                        'newborns' => $fl_return->newborns,
                        'flight_price' => $fl_return->flight_price_format
                    ]
                ];
            }
            else if($flight_type = 'oneway'){
                $data_oneway = $this->setFlightPriceArray($inputs,'oneway');
                $fl_oneway = new FlightPrice($data_oneway);
                $flights = [
                    'oneway' => [
                        'company_name' => $fl_oneway->company_name,
                        'departure_country' => $fl_oneway->departure_country,
                        'departure_airport' => $fl_oneway->departure_airport,
                        'booking_date' => date('Y-m-d'),
                        'flight_date' => $fl_oneway->flight_date,
                        'flight_time' => $fl_oneway->flight_time,
                        'arrival_country' => $fl_oneway->arrival_country,
                        'arrival_airport' => $fl_oneway->arrival_airport,
                        'adults' => $fl_oneway->adults,
                        'teenagers' => $fl_oneway->teenagers,
                        'children' => $fl_oneway->children,
                        'newborns' => $fl_oneway->newborns,
                        'flight_price' => $fl_oneway->flight_price_format
                    ]
                ];
            }
            $ft_flights = ['flights' => $flights];
            $add_temp = $this->setFlightsTemp($ft_flights);
            if(!$add_temp){
                $errno = $this->ftm->getErrno();
                $error = $this->ftm->getError();
                throw new FlightsTempNotAddedException($error,$errno);
            }
            return response()->json([
                C::KEY_STATUS => 'OK',
                'session_id' => $this->ftm->getSessionId(),
                'flight_type' => $flight_type,
                //'inputs' => $inputs,
                'flights' => $flights
            ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(FlightsArrayException|FlightsTempNotAddedException|FlightsDataModifiedException $e){
            $error = $e->getMessage();
            //Log::channel('stdout')->error("Flight search controller exception => ".var_export($error,true));
            $error = C::ERR_REQUEST;
            throw new HttpResponseException(
                response()->json([
                    C::KEY_STATUS => 'ERROR',
                    C::KEY_MESSAGE => $error
                ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
            );
        }catch(\Exception $e){
            $error = $e->getMessage();
            //Log::channel('stdout')->error("Flight search controller exception => ".$error);
            throw new HttpResponseException(
                response()->json([
                    C::KEY_STATUS => 'ERROR',
                    C::KEY_MESSAGE => $error
                ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
                /* response()->json(['errors' => $errors],422,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_SLASHES) */
            );
        }
    }
}
