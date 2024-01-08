<?php

namespace App\Http\Controllers\welcome;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Common\FlightEventBookSearchControllerCommonTrait;
use App\Http\Requests\welcome\FlightEventPriceRequest;
use Exception;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;

class FlightEventBookSearchController extends Controller
{
    use FlightEventBookSearchControllerCommonTrait;
    
    public function getFlightEventBookPrice(FlightEventPriceRequest $request){
        try{
            $data = $request->validated();
            $flightEventBookTempData = $this->getFlightEventBookPriceInfo($data);
            return response()->view(P::VIEW_FLIGHTEVENTBOOKPRICERESULT,$flightEventBookTempData,201);
        }catch(Exception $e){
            return response()->view(P::VIEW_FLIGHTEVENTBOOKPRICERESULT,[
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_FLIGHTEVENTBOOK_PREVENTIVE
            ],500);
        }
    }
}