<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Hotel;
use DateTime;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class PaypalHotelController extends Controller
{
    
    /**
     * Executed if the user cancel the payment of the hotel room
     */
    public function cancel(){
        return response()->view(P::VIEW_FLIGHT_PAYPAL_CANCEL,[
            'payment' => 'canceled',
            C::KEY_MESSAGE => C::MESS_HOTEL_PAYMENT_CANCELED
        ]);
    }

    /**
     * Executed after the user has made the payment of the hotel room
     */
    public function return(Request $request){
        try{
            $post_data = $request->all();
            Log::channel('stdout')->debug("PaypalHotelController return post => ".var_export($post_data,true));
            if(isset($post_data['payer_status'])){
                if($post_data['payer_status'] == "VERIFIED"){
                    $id = $post_data['item_number1'];
                    $hotel = Hotel::find($id);
                    if($hotel != null){
                        $hotel->payed = 1;
                        $datetime = new DateTime($post_data['payment_date']);
                        $hotel->payed_date = $datetime->format('Y-m-d H:i:s');
                        $hotel->transaction_id = $post_data['txn_id'];
                        $hotel->save();
                    }//if($hotel != null){
                    return response()->view(P::VIEW_HOTEL_PAYPAL_RETURN, [
                        'payment' => 'completed',
                        C::KEY_MESSAGE => C::OK_HOTELPAYMENT
                    ]);
                }//if($post_data['payer_status'] == "VERIFIED"){
                return response()->view(P::VIEW_HOTEL_PAYPAL_CANCEL,[
                    'payment' => 'refused',
                    C::KEY_MESSAGE => C::ERR_HOTELPAYMENT_REFUSE
                ],400);
            }//if(isset($post_data['payer_status'])){
            throw new Exception("");
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->view(P::VIEW_HOTEL_PAYPAL_RETURN,[
                    C::KEY_MESSAGE => C::ERR_HOTELPAYMENT_UNKNOWN
                ],500)
            );
        }
    }
}
