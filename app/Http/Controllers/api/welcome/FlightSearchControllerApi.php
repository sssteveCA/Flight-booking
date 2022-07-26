<?php

namespace App\Http\Controllers\api\welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\welcome\FlightSearchController;
use App\Http\Requests\api\welcome\FlightPriceRequestApi;
use App\Traits\FlightPriceTrait;

class FlightSearchControllerApi extends Controller
{
    use FlightPriceTrait;
    
    public function getFlightPrice(FlightPriceRequestApi $request){

    }
}
