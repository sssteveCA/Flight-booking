<?php

namespace App\Http\Controllers\bookflight;

use App\Http\Controllers\Controller;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Flight;
use App\Traits\Common\ResumeBookFlightControllerCommonTrait;
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
        $response_data = $this->setResponseData($request);
        /* Log::channel('stdout')->debug("ResumeBookFlightController resumeFlight response_data => ");
        Log::channel('stdout')->debug(var_export($response_data,true)); */
        return response()->view(P::VIEW_BOOKFLIGHT,$response_data,$response_data['code']);
    }


}
