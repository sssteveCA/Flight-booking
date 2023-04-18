<?php

namespace App\Http\Controllers\api\welcome;

use App\Classes\Welcome\HotelPrice;
use app\Classes\Welcome\HotelPriceTempManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\welcome\HotelPriceRequestApi;
use App\Traits\Common\HotelSearchControllerCommonTrait;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Welcome\HotelPriceErrors as Hpe;
use Illuminate\Support\Facades\Log;

class HotelSearchControllerApi extends Controller
{
    use HotelSearchControllerCommonTrait;

    public function getHotelPrice(HotelPriceRequestApi $request){
        $inputs = $request->validated();
        try{
            $hotelPriceData = $this->getHotelPriceInfo($inputs);
            return response()->json($hotelPriceData["response_array"],$hotelPriceData["response_code"],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            $response_code = 500;
            return response()->json([
                C::KEY_DONE => false, C::KEY_STATUS => 'ERROR', C::KEY_MESSAGE => C::ERR_HOTEL_PREVENTIVE
            ],$response_code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }

}
