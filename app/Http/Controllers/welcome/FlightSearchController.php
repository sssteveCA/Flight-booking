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
        $flights = [];
        Log::channel('stdout')->info('getFlightPrice method');
        $inputs = $request->validated();
        $flight_type = $inputs['flight-type'];
        try{
            if($flight_type == 'roundtrip'){
                $data_outbound = $this->setFlightPriceArray($inputs,'roundtrip_outbound');
                $fl_outbound = new FlightPrice($data_outbound);
                $data_return = $this->setFlightPriceArray($inputs,'roundtrip_return');
                $fl_return = new FlightPrice($data_return);
            }
            else if($flight_type = 'oneway'){
                $data_oneway = $this->setFlightPriceArray($inputs,'oneway');
                $fl_oneway = new FlightPrice($data_oneway);
            }
        }catch(\Exception $e){

        }
        return view('welcome/flightpriceresult',['inputs' => $inputs, 'flights' => $flights]);
    }

    private function setFlightPriceArray(array $inputs, string $flight_direction): array{
        $dc = $inputs['from'];
        $ac = $inputs['to'];
        $da = $inputs['from-airport'];
        $aa = $inputs['to-airport'];
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
            'arrival_airport_lat' => A::AIRPORTS_LIST[$da][$aa]['lat'],
            'arrival_airport_lon' => A::AIRPORTS_LIST[$da][$aa]['lon'],
            'flight_date' => $fd,
            'adults' => $inputs['adults'],
            'teenagers' => $inputs['teenagers'],
            'children' => $inputs['children'],
            'newborns' => $inputs['newborns'],
            'company_name' => $cn,
            'days_before_discount' => A::DAYS_BEFORE_DISCOUNT_LIST[$cn],
        ];
        return $data;
    }
}
