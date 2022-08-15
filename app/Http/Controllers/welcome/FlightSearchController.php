<?php

namespace App\Http\Controllers\welcome;

use App\Classes\Welcome\FlightPrice;
use App\Classes\Welcome\FlightsTempManager;
use App\Exceptions\FlightsTempNotAddedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\welcome\FlightPriceRequest;
use Illuminate\Http\Request;
use App\Interfaces\Airports as A;
use App\Interfaces\Airports;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Traits\Common\FlightSearchCommonTrait;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Traits\FlightSearchTrait;
use App\Interfaces\Welcome\FlightsTempManagerErrors as Ftme;


class FlightSearchController extends Controller
{
    use FlightSearchTrait;
 
    //Get airports list from specific country
    public function getCountryAirports(Request $request){
        $country = $request->input('country');
        $list = $this->getAirportsList($country);
        return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    //Get flight companies list
    public function getFlightCompanies(){
        $list = $this->getFlightCompaniesList();
        return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }


    //Get countries list from array
    public function getCountires(){
        $list = $this->getCountriesList();
        return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    //Get the flight based on input data
    public function getFlightPrice(FlightPriceRequest $request){
        $flights = [];
        //Log::channel('stdout')->info('getFlightPrice method');
        $inputs = $request->validated();
        //Log::channel('stdout')->info("getFlightPrice inputs => ".var_export($inputs,true));
        $flight_type = $inputs['flight-type'];
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
                        'total_price' => $fl_outbound->total_price_format
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
                        'total_price' => $fl_return->total_price_format
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
                        'total_price' => $fl_oneway->total_price_format
                    ]
                ];
            }
            $add_temp = $this->setFlightsTemp($flights);
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
            Log::channel('stdout')->error("Flight search controller exception => ".var_export($error,true));
            $errors_array = [ $error];
            throw new HttpResponseException(
                response()->view(P::VIEW_FLIGHTPRICERESULT,['errors_array' => $errors_array],400)
                /* response()->json(['errors' => $errors],422,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_SLASHES) */
            );
        }
    }

    //when after login redirect to flight price page
    public function getFlightPrice_get(){
        $response = session()->get('response');
        /* Log::channel('stdout')->debug("FlightSearchController getFlightPrice_get");
        Log::channel('stdout')->debug("FlightSearchController getFlightPrice_get data => ".var_export($response,true)); */
        return response()->view(P::VIEW_FLIGHTPRICERESULT,[
            'response' => [
                'flight_type' => $response['flight_type'],
                'inputs' => $response['inputs'], 
                'flights' => $response['flights']
            ]   
        ],200);
    }

    //set flight temp table records
    private function setFlightsTemp(array $flights_data): bool{
        $set = false;
        $this->ftm = new FlightsTempManager($flights_data);
        $added = $this->ftm->addFlightsTemp();
        if($added)
            $set = true;
        return $set;
    }

}
