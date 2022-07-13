<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
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
        Log::channel('stdout')->debug("PaypalController return post_data => ".var_export($post_data,true));
        return response()->view(P::VIEW_PAYPAL_RETURN,[
            'payment' => 'completed',
            'message' => C::OK_FLIGHTPAYMENT,
            'post_data' => $post_data
        ],200);
    }
}
