<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use App\Traits\Common\CarRentalSearchControllerCommonTrait;
use Illuminate\Http\Request;


class CarRentalSearchController extends Controller
{
    use CarRentalSearchControllerCommonTrait;

    /**
     * Get the car rental information for the response
     */
    public function getCarRentalData(){
        return response()->json($this->getRentalCarArray(),200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE); 
    }
}
