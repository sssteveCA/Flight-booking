<?php

namespace App\Http\Controllers\welcome;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\Http\Requests\welcome\FlightEventPriceRequest;
use Exception;

class FlightEventBookSearchController extends Controller
{
    use FlightEventBookSearchControllerCommonTrait;
    
    public function getFlightEventBookPrice(FlightEventPriceRequest $request){
        try{
            $data = $request->validated();
        }catch(Exception $e){

        }
    }
}