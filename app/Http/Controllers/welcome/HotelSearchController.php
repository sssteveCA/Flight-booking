<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use App\Traits\Common\HotelSearchControllerCommonTrait;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;

class HotelSearchController extends Controller
{
    use HotelSearchControllerCommonTrait;

    public function getHotelPrice(Request $request){
        return response()->view(P::VIEW_HOTELPRICERESULT,[]);
    }
}
