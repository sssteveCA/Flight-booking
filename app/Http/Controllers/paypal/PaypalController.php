<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Flight;
use DateTime;
use DateTimeImmutable;
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
            $message = C::OK_FLIGHTPAYMENT;
            $payment = 'completed';
        }//if($post_data['status'] == "VERIFIED"){
        else{
            $message = C::ERR_FLIGHTPAYMENT_REFUSE;
            $payment = 'refused';
        }
        //Log::channel('stdout')->debug("PaypalController return post_data => ".var_export($post_data,true));
        return response()->view(P::VIEW_PAYPAL_RETURN,[
            'payment' => $payment,
            'message' => $message,
            'post_data' => $post_data
        ],200);
    }
}
