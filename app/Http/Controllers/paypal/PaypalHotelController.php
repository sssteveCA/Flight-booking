<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;

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
}
