<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use App\Http\Requests\welcome\HotelPriceRequest;
use App\Traits\Common\HotelSearchControllerCommonTrait;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;
use Illuminate\Support\Facades\Log;

class HotelSearchController extends Controller
{
    use HotelSearchControllerCommonTrait;

    public function getHotelPrice(HotelPriceRequest $request){
        $inputs = $request->validated();
        Log::channel('stdout')->info("Hotel search controller getHotelPrice inputs => ".var_export($inputs,true));
        return response()->view(P::VIEW_HOTELPRICERESULT,[]);
    }
}
