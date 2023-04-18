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
        try{
            $hotelPriceData = $this->getHotelPriceInfo($inputs);
            return response()->view(P::VIEW_HOTELPRICERESULT,$hotelPriceData["response_array"],$hotelPriceData["response_code"]);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->view(P::VIEW_HOTELPRICERESULT,[
                    C::KEY_DONE => false,
                    'error_message' => C::ERR_HOTEL_PREVENTIVE
                ],500)
            );
        }
    }

    /**
     * Redirect the user to the hotel price result page if came from login page after seen the price but he was not logged
     */
    public function getHotelPrice_get(){
         $response = session()->get('response');
         return response()->view(P::VIEW_HOTELPRICERESULT,[
            C::KEY_DONE => true,
            'response' => [
                'session_id' => $response['session_id'],
                'hotel' => $response['hotel']
            ]
         ],200);   
    }
}
