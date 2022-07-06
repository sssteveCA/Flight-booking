<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Airports;

class FlightSearchController extends Controller
{

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

    public function getCountiresSuggestions(Request $request){
        $query = $request->input('query');
        $list = $this->getCountriesList($query);
        return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    private function getCountriesList(string $query): array{
        $list = [];
        $airports = Airports::AIRPORT_LIST;
        $regex = '/^'.$query.'/i';
        foreach($airports as $k => $country){
            if(preg_match($regex,$k)){
                //Key of airports array start with query
                $list[$k] = $country;
            }//if(preg_match($regex,$k)){
        }
        return $list;
    }
}
