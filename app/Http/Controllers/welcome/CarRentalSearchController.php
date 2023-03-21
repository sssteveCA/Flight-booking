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
            Log::channel('stdout')->info("CarRentalSearchController getCarRentalPrice data => ".var_export($data,true));
            $carrentalprice = new CarRentalPrice([
                'car_name' => $data['car'],
                'car_rental_array' => $this->getRentalCarArray(),
                'company_name' => $data['rent_company'],
                'age_range' => $data['age_range'],
                'rentstart_date' => $data['rentstart'],
                'rentend_date' => $data['rentend']
            ]);
            return response()->view(P::VIEW_CARRENTALPRICERESULT,[
                C::KEY_DONE => true, 
                C::KEY_DATA => [
                    'car_name' => $carrentalprice->getCarName(),
                    'company_name' => $carrentalprice->getCompanyName(),
                    'age_range' => $carrentalprice->getAgeRange(),
                    'rentstart_date' => $carrentalprice->getRentStartDate(),
                    'rentend_date' => $carrentalprice->getRentEndDate(),
                    'total_price', $carrentalprice->getTotalPrice()
                ]
            ],200);
        }catch(Exception $e){
            Log::channel('stdout')->error("CarRentalSearchController getCarRentalPrice Exception => ".var_export($e->getMessage(),true));
            return response()->view(P::VIEW_CARRENTALPRICERESULT,[
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_CARRENTAL_PREVENTIVE
            ],500);
        }   
    }
}
