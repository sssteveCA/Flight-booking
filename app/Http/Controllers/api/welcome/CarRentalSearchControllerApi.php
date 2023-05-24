<?php

namespace App\Http\Controllers\api\welcome;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\welcome\CarRentalPriceRequestApi;
use App\Traits\Common\CarRentalSearchControllerCommonTrait;
use Exception;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;

class CarRentalSearchControllerApi extends Controller
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
    public function getCarRentalPrice(CarRentalPriceRequestApi $request){
        $data = $request->validated();
        try{
            $carrentaldata = $this->getCarRentalPriceInfo($data);
            return response()->json($carrentaldata,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_CARRENTAL_PREVENTIVE
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }
}
