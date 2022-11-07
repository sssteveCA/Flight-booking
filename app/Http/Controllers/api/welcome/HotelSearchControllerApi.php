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

class HotelSearchControllerApi extends Controller
{
    use HotelSearchControllerCommonTrait;

    public function getHotelPrice(HotelPriceRequestApi $request){
        $inputs = $request->validated();
        try{
            $hotelPrice = new HotelPrice($inputs);
            $errnoHp = $hotelPrice->getErrno();
            switch($errnoHp){
                case 0:
                    $response_array = [
                        C::KEY_DONE => true,
                        'data' => [
                            'country' => $hotelPrice->getCountry(),'hotel' => $hotelPrice->getHotel(),'checkin' => $hotelPrice->getCheckin(),
                            'checkout' => $hotelPrice->getCheckout(),'people' => $hotelPrice->getPeople(),'rooms' => $hotelPrice->getRooms(),
                            'price' => $hotelPrice->getFullPrice()]
                        ];
                        $hptm_params = $response_array["data"];
                        $hptm = new HotelPriceTempManager($hptm_params);
                        $hptm->addHotelPriceTemp();
                        $response_code = 201;
                    break;
                case Hpe::TOOMANYPEOPLE_FOR_ROOMS:
                    $response_array = [
                        C::KEY_DONE => false, C::KEY_MESSAGE => $hotelPrice->getError()
                    ];
                    $response_code = 400;
                    break;
                default:
                    $response_array = [
                        C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_HOTEL_PREVENTIVE
                    ];
                    $response_code = 500;
                    break;
            }
            return response()->json($response_array,$response_code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->json([
                    C::KEY_DONE => false, C::KEY_STATUS => 'ERROR', C::KEY_MESSAGE => C::ERR_HOTEL_PREVENTIVE
                ])
            );
        }
    }

}
