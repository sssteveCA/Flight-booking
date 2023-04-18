<?php

namespace App\Http\Controllers\bookflight;

use App\Http\Controllers\Controller;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Flight;
use App\Traits\Common\ResumeBookFlightControllerCommonTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

//This controller is used to allow users to book flights that previously have not been payed
class ResumeBookFlightController extends Controller
{

    use ResumeBookFlightControllerCommonTrait;

    /**
     * Resume the payment of the flights
     * @param \Illuminate\Http\Request $request
     */
    public function resumeFlight(Request $request){
        try{
            $response_data = $this->setResponseData($request);
            if(in_array($response_data[C::KEY_CODE],[200,400]))
                return response()->view(P::VIEW_BOOKFLIGHT,$response_data[C::KEY_RESPONSE],$response_data[C::KEY_CODE]);
            session()->put('redirect','1');
            return redirect(P::URL_ERRORS);
        }catch(Exception $e){
            return response()->view(P::VIEW_BOOKFLIGHT,[
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_REQUEST
            ],500);
        }
        
    }


}
