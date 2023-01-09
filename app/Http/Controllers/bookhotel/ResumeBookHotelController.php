<?php

namespace App\Http\Controllers\bookhotel;

use App\Http\Controllers\Controller;
use App\Traits\Common\ResumeBookHotelControllerCommonTrait;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;

class ResumeBookHotelController extends Controller
{

    use ResumeBookHotelControllerCommonTrait;


    /**
     * Resume the payment of the hotel rooms
     * @param \Illuminate\Http\Request $request
     */
    public function resumeHotel(Request $request){
        $response_data = $this->setResponseData($request);
        if(in_array($response_data["code"],[200,404]))
            return response()->view(P::VIEW_BOOKHOTEL,$response_data["response"],$response_data["code"]);
        session()->put('redirect','1');
        return redirect(P::URL_ERRORS);
    }
}
