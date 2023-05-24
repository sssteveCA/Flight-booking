<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\CarRental;
use Exception;

class PaypalCarRentalController extends Controller
{
    /**
     * Executed if the user cancel the payment of the car
     */
    public function cancel(){
        return response()->view(P::VIEW_CARRENTAL_PAYPAL_CANCEL,[
            'payment' => 'canceled',
            C::KEY_MESSAGE => C::MESS_CARRENTAL_PAYMENT_CANCELED
        ]);
    }

    /**
     * Executed after the user has done the payment of the car
     */
    public function return(Request $request){
        try{
            $post_data = $request->all();
            if(isset($post_data['payer_status'])){
                if($post_data['payer_status'] == "VERIFIED"){
                    $car = CarRental::find($post_data['item_number1']);
                    if($car != null){
                        $car->payed = 1;
                        $datetime = new DateTime($post_data['payment_date']);
                        $car->payed_date = $datetime->format('Y-m-d H:i:s');
                        $car->transaction_id = $post_data['txn_id'];
                        $car->save();
                        return response()->view(P::VIEW_CARRENTAL_PAYPAL_RETURN,[
                            'payment' => 'completed',
                            C::KEY_MESSAGE => C::OK_CARRENTALPAYMENT
                        ]);
                    }//if($car != null){
                    throw new Exception;
                }//if($post_data['payer_status'] == "VERIFIED")
                return response()->view(P::VIEW_CARRENTAL_PAYPAL_CANCEL,[
                    'payment' => 'refused',
                    C::KEY_MESSAGE => C::ERR_CARRENTALPAYMENT_REFUSE
                ],400);
            }//if(isset($post_data['payer_status'])){
        }catch(Exception $e){
            return response()->view(P::VIEW_CARRENTAL_PAYPAL_RETURN,[
                C::KEY_MESSAGE => C::ERR_CARRENTALPAYMENT_UNKNOWN
            ],500);
        }
        
    }
}
