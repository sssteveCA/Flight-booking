<?php

namespace App\Traits\Common;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;

/**
 * This trait is used for common code between ResumeBookController & ResumeBookControllerApi
 */
trait ResumeBookHotelControllerCommonTrait{


    /**
     * Set the response array to send to the view to complete the payment
     * @param \Illuminate\Http\Request $request 
     */
    private function setResponseData(Request $request): array{
        if($request->filled('hotel_id')){
            $hotel_id = $request->hotel_id;
            $hotel = Hotel::find($hotel_id);
            if($hotel != null){
                $user_id = auth()->id();
                if($user_id == $hotel->user_id){
                    return [
                        C::KEY_CODE => 200,
                        C::KEY_RESPONSE => [
                            C::KEY_DONE => true, C::KEY_STATUS => 'OK', 
                            C::KEY_MESSAGE => C::OK_HOTELCONFIRMPAYMENT, 'hotel' => $hotel->toArray()
                        ]
                    ];
                }//if($user_id == $hotel->user_id){
                return [ C::KEY_CODE => 401 ];
            }//if($hotel != null){
            return [C::KEY_CODE => 404 ];
        }//if($request->filled('hotel_id')){
        return [
            C::KEY_CODE => 400,
            C::KEY_RESPONSE => [
                C::KEY_DONE => false, C::KEY_STATUS => 'ERROR', C::KEY_MESSAGE => C::ERR_REQUEST
            ]
        ];
    }
}
?>