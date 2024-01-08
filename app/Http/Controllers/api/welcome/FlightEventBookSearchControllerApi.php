<?php

namespace App\Http\Controllers\api\welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\api\welcome\FlightEventPriceRequestApi;
use App\Traits\Common\FlightEventBookSearchControllerCommonTrait;
use Exception;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;

class FlightEventBookSearchControllerApi extends Controller
{
    use FlightEventBookSearchControllerCommonTrait;

    public function getFlightEventBookPrice(FlightEventPriceRequestApi $request){
        try{
            $data = $request->validated();
            $flightEventBookTempData = $this->getFlightEventBookPriceInfo($data);
            return response()->json($flightEventBookTempData,201,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_FLIGHTEVENTBOOK_PREVENTIVE
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }

}
