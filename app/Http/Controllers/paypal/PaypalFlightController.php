<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Flight;
use DateTime;
use DateTimeImmutable;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class PaypalFlightController extends Controller
{
    /**
     * Executed if the user cancel the payment of the flight
     */
    public function cancel(){
        return response()->view(P::VIEW_FLIGHT_PAYPAL_CANCEL,[
            'payment' => 'canceled',
            C::KEY_MESSAGE => C::MESS_FLIGHT_PAYMENT_CANCELED
        ]);
    }

    /**
     * Executed after the user has made the payment of the flight
     */
    public function return(Request $request){
        try{
            $post_data = $request->all();
            if(isset($post_data['payer_status'])){
                if($post_data['payer_status'] == "VERIFIED"){
                    //Payment completed
                    //Get number of payed items
                    $items_number = $post_data['num_cart_items'];
                    for($n = 1; $n <= $items_number; $n++){
                        $id = $post_data["item_number{$n}"];
                        $flight = Flight::find($id);
                        if($flight != null){
                            //Found record with provided id
                            $flight->payed = 1;
                            $datetime = new DateTime($post_data['payment_date']);
                            $flight->payed_date = $datetime->format('Y-m-d H:i:s');
                            $flight->transaction_id = $post_data['txn_id'];
                            $flight->save();
                        }//if($flight != null){
                    }
                    return response()->view(P::VIEW_FLIGHT_PAYPAL_RETURN,[
                        'payment' => 'completed',
                        C::KEY_MESSAGE => C::OK_FLIGHTPAYMENT,
                    ]);
                }//if($post_data['status'] == "VERIFIED"){
                return response()->view(P::VIEW_FLIGHT_PAYPAL_RETURN,[
                    'payment' => 'refused',
                    C::KEY_MESSAGE => C::ERR_FLIGHTPAYMENT_REFUSE,
                ],400);
            }//if(isset($post_data['payer_status'])){
            throw new Exception("");
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->view(P::VIEW_FLIGHT_PAYPAL_RETURN,[
                    C::KEY_MESSAGE => C::ERR_FLIGHTPAYMENT_UNKNOWN,
                ],500)
            );
        }
    }
}
