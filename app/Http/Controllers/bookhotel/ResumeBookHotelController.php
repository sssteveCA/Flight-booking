<?php

namespace App\Http\Controllers\bookhotel;

use App\Http\Controllers\Controller;
use App\Traits\Common\ResumeBookHotelControllerCommonTrait;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;
use App\Interfaces\Constants as C;
use Exception;

class ResumeBookHotelController extends Controller
{

    use ResumeBookHotelControllerCommonTrait;


    /**
     * Resume the payment of the hotel rooms
     * @param \Illuminate\Http\Request $request
     */
    public function resumeHotel(Request $request){
        try{
            $response_data = $this->setResponseData($request);
            if(in_array($response_data[C::KEY_CODE],[200,404]))
                return response()->view(P::VIEW_BOOKHOTEL,$response_data["response"],$response_data[C::KEY_CODE]);
            session()->put('redirect','1');
            return redirect(P::URL_ERRORS);
        }catch(Exception $e){
            return response()->view(P::VIEW_BOOKHOTEL,[
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_REQUEST
            ],500);
        }
        
    }
}
