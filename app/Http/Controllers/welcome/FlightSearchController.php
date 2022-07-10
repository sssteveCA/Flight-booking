<?php

namespace App\Http\Controllers\welcome;

use App\Classes\Welcome\FlightPrice;
use App\Http\Controllers\Controller;
use App\Http\Requests\welcome\FlightPriceRequest;
use Illuminate\Http\Request;
use App\Interfaces\Airports as A;
use App\Interfaces\Airports;
use App\Interfaces\Constants as C;
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
        Log::channel('stdout')->info('getFlightPrice method');
        $inputs = $request->validated();
        return view('welcome/flightpriceresult',['inputs' => $inputs]);
    }

    private function setFlightPriceArray(FlightPriceRequest $request, string $flight_direction): array{
        $dc = $request->from;
        $ac = $request->to;
        $da = $request->input('from-airport');
        $aa = $request->input('to-airport');
        $cn = Airports::COMPANIES_LIST[0];
        if($flight_direction == 'oneway'){
            //Oneway flight
            $fd = $request->input('oneway-date',C::ERR_VALUENOTOBTAINED);
        }
        else if($flight_direction == "roundtrip_outbound"){
            //Outbound flight
            $fd = $request->input('roundtrip-start-date',C::ERR_VALUENOTOBTAINED);
        }
        else{ // "roundtrip_return"
            //Return flight
            $fd = $request->input('roundtrip-end-date',C::ERR_VALUENOTOBTAINED);
        }
        $data = [
            'departure_country' => $dc,
            'arrival_country' => $ac,
            'departure_airport' => $da,
            'departure_airport_lat' => A::AIRPORTS_LIST[$dc][$da]['lat'],
            'departure_airport_lon' => A::AIRPORTS_LIST[$dc][$da]['lon'],
            'arrival_airport' => $aa,
            'arrival_airport_lat' => A::AIRPORTS_LIST[$da][$aa]['lat'],
            'arrival_airport_lon' => A::AIRPORTS_LIST[$da][$aa]['lon'],
            'flight_date' => $fd,
            'adults' => $request->adults,
            'teenagers' => $request->teenagers,
            'children' => $request->children,
            'newborns' => $request->newborns,
            'company_name' => $cn,
            'days_before_discount' => A::DAYS_BEFORE_DISCOUNT_LIST[$cn],
        ];
        return $data;
    }
}
