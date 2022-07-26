<?php

namespace App\Http\Controllers\api\welcome;

use App\Classes\Welcome\FlightPrice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\welcome\FlightSearchController;
use App\Http\Requests\api\welcome\FlightPriceRequestApi;
use App\Traits\FlightSearchTrait;

class FlightSearchControllerApi extends Controller
{
    use FlightSearchTrait;
    
    public function getFlightPrice(FlightPriceRequestApi $request){
        return 'request ok';
    }
}
