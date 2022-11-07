<?php

namespace App\Http\Controllers\welcome;

use App\Classes\Welcome\HotelPrice;
use app\Classes\Welcome\HotelPriceTempManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\welcome\HotelPriceRequest;
use App\Traits\Common\HotelSearchControllerCommonTrait;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;
use App\Interfaces\Constants as C;
use App\Interfaces\Welcome\HotelPriceErrors as Hpe;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class HotelSearchController extends Controller
{
    use HotelSearchControllerCommonTrait;

    public function getHotelPrice(HotelPriceRequest $request){
        $inputs = $request->validated();
        //Log::channel('stdout')->debug("Hotel search controller getHotelPrice inputs => ".var_export($inputs,true));
        try{
            $hotelPrice = new HotelPrice($inputs);
            $errnoHp = $hotelPrice->getErrno();
            switch($errnoHp){
                case 0:
                    $response_array = [
                        C::KEY_DONE => true,
                        'data' => [
                            'country' => $hotelPrice->getCountry(), 'city' => $hotelPrice->getCity(), 'hotel' => $hotelPrice->getHotel(),
                            'checkin' => $hotelPrice->getCheckin(), 'checkout' => $hotelPrice->getCheckout(), 'people' => $hotelPrice->getPeople(),
                            'rooms' => $hotelPrice->getRooms(), 'price' => $hotelPrice->getFullPrice()]
                    ];
                    $hptm_params = $response_array["data"];
                    $hptm = new HotelPriceTempManager($hptm_params);
                    $hptm->addHotelPriceTemp();
                    $response_code = 200;
                    break;
                case Hpe::TOOMANYPEOPLE_FOR_ROOMS:
                    $response_array = [
                        C::KEY_DONE => false, 'error_message' => $hotelPrice->getError()];
                    $response_code = 400;
                    break;
                default:
                    $response_array = [
                        C::KEY_DONE => false, 'error_message' => C::ERR_HOTEL_PREVENTIVE];
                    $response_code = 500;
                    break;
            }
            return response()->view(P::VIEW_HOTELPRICERESULT,$response_array,$response_code);
        }catch(Exception $e){
            //Log::channel('stdout')->info("HotelSearchController getHotelPrice exception => ".$e->getMessage());
            throw new HttpResponseException(
                response()->view(P::VIEW_HOTELPRICERESULT,[
                    C::KEY_DONE => false,
                    'error_message' => C::ERR_HOTEL_PREVENTIVE
                ],500)
            );
        }
    }
}
