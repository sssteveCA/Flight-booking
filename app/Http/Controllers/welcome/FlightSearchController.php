<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use App\Http\Requests\welcome\FlightPriceRequest;
use Illuminate\Http\Request;
use App\Interfaces\Airports;

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
        $airports = Airports::AIRPORT_LIST;
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
        $airports = Airports::AIRPORT_LIST;
        $list = array_keys($airports);
        return $list;
    }

    //Get the flight based on input data
    public function getFlightPrice(FlightPriceRequest $request){
        $inputs = $request->collect();
        return view('welcome/flightpriceresult',$inputs);
    }
}
