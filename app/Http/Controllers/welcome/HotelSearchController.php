<?php

namespace App\Http\Controllers\welcome;

use App\Classes\Welcome\HotelPrice;
use App\Http\Controllers\Controller;
use App\Http\Requests\welcome\HotelPriceRequest;
use App\Traits\Common\HotelSearchControllerCommonTrait;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;
use App\Interfaces\Constants as C;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class HotelSearchController extends Controller
{
    use HotelSearchControllerCommonTrait;

    public function getHotelPrice(HotelPriceRequest $request){
        $inputs = $request->validated();
        Log::channel('stdout')->info("Hotel search controller getHotelPrice inputs => ".var_export($inputs,true));
        try{
            $hotelPrice = new HotelPrice($inputs);
            $errnoHp = $hotelPrice->getErrno();
            switch($errnoHp){
                case 0:
                    $response_array = [];
                    $response_code = 200;
                    break;
                default:
                    $response_array = ['error_message' => C::ERR_HOTEL_PREVENTIVE];
                    $response_code = 500;
                    break;
            }
            return response()->view(P::VIEW_HOTELPRICERESULT,$response_array,$response_code);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->view(P::VIEW_HOTELPRICERESULT,[
                    'error_message' => C::ERR_HOTEL_PREVENTIVE
                ],500)
            );
        }
    }
}
