<?php

namespace App\Http\Controllers\welcome;

use App\Classes\Welcome\FlightPrice;
use App\Http\Controllers\Controller;
use App\Http\Requests\welcome\FlightPriceRequest;
use Illuminate\Http\Request;
use App\Interfaces\Airports as A;
use App\Interfaces\Airports;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;


class FlightSearchController extends Controller
{
 
    //Get airports list from specific country
    public function getCountryAirports(Request $request){
        $country = $request->input('country');
        $list = $this->getAirportsList($country);
        return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    private function getAirportsList(string $country): array{
        $list = [];
        $airports = A::AIRPORTS_LIST;
        $key_exists = array_key_exists($country,$airports);
        if($key_exists){
            $list = $airports[$country];
        }
        return $list;
    }

    //Get countries list from array
    public function getCountires(){
        $list = $this->getCountriesList();
        return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    private function getCountriesList(): array{
        $list = [];
        $airports = A::AIRPORTS_LIST;
        $list = array_keys($airports);
        return $list;
    }

    //Get the flight based on input data
    public function getFlightPrice(FlightPriceRequest $request){
        $flights = [];
        Log::channel('stdout')->info('getFlightPrice method');
        $inputs = $request->validated();
        Log::channel('stdout')->info("getFlightPrice inputs => ".var_export($inputs,true));
        $flight_type = $inputs['flight-type'];
        Log::channel('stdout')->info("getFlightPrice flight_type => {$flight_type}");
        try{
            if($flight_type == 'roundtrip'){
                $data_outbound = $this->setFlightPriceArray($inputs,'roundtrip_outbound');
                Log::channel('stdout')->info("data outbound array => ".var_export($data_outbound,true));
                $fl_outbound = new FlightPrice($data_outbound);
                Log::channel('stdout')->info("fl outbound errno => ".$fl_outbound->getErrno());
                $data_return = $this->setFlightPriceArray($inputs,'roundtrip_return');
                Log::channel('stdout')->info("data return array => ".var_export($data_return,true));
                $fl_return = new FlightPrice($data_return);
                Log::channel('stdout')->info("fl return errno => ".$fl_return->getErrno());
                $flights = [
                    'outbound' => [
                        'company_name' => $fl_outbound->company_name,
                        'departure_country' => $fl_outbound->departure_country,
                        'departure_airport' => $fl_outbound->departure_airport,
                        'flight_date' => $fl_outbound->flight_date,
                        'hours' => $fl_outbound->hours,
                        'arrival_country' => $fl_outbound->arrival_country,
                        'arrival_airport' => $fl_outbound->arrival_airport,
                        'total_price' => $fl_outbound->total_price_format
                    ],
                    'return' => [
                        'company_name' => $fl_return->company_name,
                        'departure_country' => $fl_return->departure_country,
                        'departure_airport' => $fl_return->departure_airport,
                        'flight_date' => $fl_return->flight_date,
                        'hours' => $fl_return->hours,
                        'arrival_country' => $fl_return->arrival_country,
                        'arrival_airport' => $fl_return->arrival_airport,
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
                        'flight_date' => $fl_oneway->flight_date,
                        'hours' => $fl_oneway->hours,
                        'arrival_country' => $fl_oneway->arrival_country,
                        'arrival_airport' => $fl_oneway->arrival_airport,
                        'total_price' => $fl_oneway->total_price_format
                    ]
                ];
            }
        }catch(\Exception $e){
            $error = $e->getMessage();
            Log::channel('stdout')->error("Flight search controller exception => ".$error);
            $errors_array = [ $error];
            throw new HttpResponseException(
                response()->view(P::VIEW_FLIGHTPRICERESULT,['errors_array' => $errors_array],400)
                /* response()->json(['errors' => $errors],422,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_SLASHES) */
            );
        }
        return response()->view(P::VIEW_FLIGHTPRICERESULT,[
            'response' => [
                'flight_type' => $flight_type,
                'inputs' => $inputs, 
                'flights' => $flights
            ]   
        ],200);
    }

    private function setFlightPriceArray(array $inputs, string $flight_direction): array{
        Log::channel('stdout')->info('setFlightPrice method');
        if($flight_direction == 'roundtrip_return'){
            $dc = $inputs['to'];
            $ac = $inputs['from'];
            $da = $inputs['to-airport'];
            $aa = $inputs['from-airport'];
        }
        else{
            $dc = $inputs['from'];
            $ac = $inputs['to'];
            $da = $inputs['from-airport'];
            $aa = $inputs['to-airport'];
        }
        $cn = Airports::COMPANIES_LIST[0];
        if($flight_direction == 'oneway'){
            //Oneway flight
            $fd = $inputs['oneway-date'];
        }
        else if($flight_direction == "roundtrip_outbound"){
            //Outbound flight
            $fd = $inputs['roundtrip-start-date'];
        }
        else{ // "roundtrip_return"
            //Return flight
            $fd = $inputs['roundtrip-end-date'];
        }
        $data = [
            'departure_country' => $dc,
            'arrival_country' => $ac,
            'departure_airport' => $da,
            'departure_airport_lat' => A::AIRPORTS_LIST[$dc][$da]['lat'],
            'departure_airport_lon' => A::AIRPORTS_LIST[$dc][$da]['lon'],
            'arrival_airport' => $aa,
            'arrival_airport_lat' => A::AIRPORTS_LIST[$ac][$aa]['lat'],
            'arrival_airport_lon' => A::AIRPORTS_LIST[$ac][$aa]['lon'],
            'flight_date' => $fd,
            'adults' => $inputs['adults'],
            'teenagers' => $inputs['teenagers'],
            'children' => $inputs['children'],
            'newborns' => $inputs['newborns'],
            'company_name' => $cn,
            'days_before_discount' => A::DAYS_BEFORE_DISCOUNT_LIST[$cn],
            'age_bands' => A::AGE_BANDS[$cn],
            'timetable_daily_bands' => A::TIMETABLE_DAILY_BANDS[$cn],
            'timetable_hour_bands' => A::TIMETABLE_HOUR_BANDS[$cn],
            'timetable_days' => A::TIMETABLE_DAYS[$cn],
            'timetable_months' => A::TIMETABLE_MONTHS[$cn]
        ];
        //Log::channel('stdout')->info('setFlightPrice method data => '.var_export($data,true));
        return $data;
    }
}
