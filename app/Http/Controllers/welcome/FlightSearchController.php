<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Airports;

class FlightSearchController extends Controller
{
    //
    public function getCountiresSuggestions(Request $request){
        $query = $request->input('query');
        $list = $this->getCountriesList($query);
        return response()->json(
            $list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE
        );
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
