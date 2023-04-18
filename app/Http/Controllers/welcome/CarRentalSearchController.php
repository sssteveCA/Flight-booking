<?php

namespace App\Http\Controllers\welcome;

use App\Classes\CarRentalPrice;
use App\Http\Controllers\Controller;
use App\Http\Requests\welcome\CarRentalPriceRequest;
use App\Traits\Common\CarRentalSearchControllerCommonTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;


class CarRentalSearchController extends Controller
{
    use CarRentalSearchControllerCommonTrait;

    /**
     * Get the car rental information for the response
     */
    public function getCarRentalData(){
        return response()->json($this->getRentalCarArray(),200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE); 
    }

    /**
     * Get the preventive for the selected car with the input data
     */
    public function getCarRentalPrice(CarRentalPriceRequest $request){
        try{
            $data = $request->validated();
            $carrentaldata = $this->getCarRentalPriceInfo($data);
            return response()->view(P::VIEW_CARRENTALPRICERESULT,$carrentaldata,201);
        }catch(Exception $e){
            return response()->view(P::VIEW_CARRENTALPRICERESULT,[
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_CARRENTAL_PREVENTIVE
            ],500);
        }   
    }
}
