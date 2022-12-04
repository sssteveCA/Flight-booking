<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Flight;
use DateTime;
use DateTimeImmutable;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class PaypalController extends Controller
{
    //URL if the user cancel the payment
    public function cancel(){
        return response()->view(P::VIEW_PAYPAL_CANCEL,[
            'payment' => 'canceled',
            'message' => C::MESS_FLIGHT_PAYMENT_CANCELED
        ],200);
    }

    //Return URL after user has made the payment
    public function return(Request $request){
        $post_data = $request->all();
        //Log::channel('stdout')->debug("PaypalController return post => ".var_export($post_data,true));
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
                return response()->view(P::VIEW_PAYPAL_RETURN,[
                    'payment' => 'completed',
                    'message' => C::OK_FLIGHTPAYMENT,
                    'post_data' => $post_data
                ],200);
            }//if($post_data['status'] == "VERIFIED"){
            return response()->view(P::VIEW_PAYPAL_RETURN,[
                'payment' => 'refused',
                'message' => C::ERR_FLIGHTPAYMENT_REFUSE,
                'post_data' => $post_data
            ],400);
        }//if(isset($post_data['payer_status'])){
        throw new HttpResponseException(
            response()->view(P::VIEW_PAYPAL_RETURN,[
                'message' => C::ERR_FLIGHTPAYMENT_UNKNOWN,
                'post_data' => $post_data
            ],500)
        );
        //Log::channel('stdout')->debug("PaypalController return post_data => ".var_export($post_data,true));
    }
}
