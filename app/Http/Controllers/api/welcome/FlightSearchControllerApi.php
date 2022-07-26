<?php

namespace App\Http\Controllers\api\welcome;

use App\Classes\Welcome\FlightPrice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\welcome\FlightSearchController;
use App\Http\Requests\api\welcome\FlightPriceRequestApi;
use App\Interfaces\Paths as P;
use App\Traits\FlightSearchTrait;
use Illuminate\Http\Exceptions\HttpResponseException;

class FlightSearchControllerApi extends Controller
{
    use FlightSearchTrait;
    
    public function getFlightPrice(FlightPriceRequestApi $request){
        return 'request ok';
        $flights = [];
        //Log::channel('stdout')->info('getFlightPrice method');
        $inputs = $request->validated();
        //Log::channel('stdout')->info("getFlightPrice inputs => ".var_export($inputs,true));
        $flight_type = $inputs['flight-type'];
        //Log::channel('stdout')->info("getFlightPrice flight_type => {$flight_type}");
        try{

        }catch(\Exception $e){
            $error = $e->getMessage();
            //Log::channel('stdout')->error("Flight search controller exception => ".$error);
            throw new HttpResponseException(
                response()->json(['error' => $error],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
                /* response()->json(['errors' => $errors],422,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_SLASHES) */
            );
        }
    }
}
