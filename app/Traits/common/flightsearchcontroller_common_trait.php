<?php

namespace App\Traits\Common;

use App\Interfaces\Constants as C;
use App\Classes\Welcome\FlightsTempManager;
use App\Interfaces\Airports as A;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

//This trait is used to store common code in FlighSearchController & FlighSearchControllerApi
trait FlightSearchCommonTrait{

    private FlightsTempManager $ftm;

    //Get airports list from specific country
    public function getCountryAirports(Request $request){
        try{
            $country = $request->input('country');
            if($country != null){
                $list = $this->getAirportsList($country);
                return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }
            throw new Exception(C::ERR_REQUEST);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->json([
                    C::KEY_STATUS => 'ERROR',
                    C::KEY_MESSAGE => C::ERR_REQUEST
                ],400,[],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)
            );
        }
        
    }

    protected function getAirportsList(string $country): array{
        $list = [];
        $airports = A::AIRPORTS_LIST;
        $key_exists = array_key_exists($country,$airports);
        if($key_exists){
            $list = $airports[$country];
        }
        return $list;
    }

    //Get countries list from array
    public function getCountries(){
        $list = $this->getCountriesList();
        return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    protected function getCountriesList(): array{
        $list = [];
        $airports = A::AIRPORTS_LIST;
        $list = array_keys($airports);
        return $list;
    }

    //Get flight companies list
    public function getFlightCompanies(){
        $list = $this->getFlightCompaniesList();
        return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    protected function getFlightCompaniesList(): array{
        $list = A::COMPANIES_LIST;
        return $list;
    }
    
    protected function setFlightPriceArray(array $inputs, string $flight_direction): array{
        //Log::channel('stdout')->info('setFlightPrice method');
        if($flight_direction == 'roundtrip_return'){
            $dc = $inputs['to_country'];
            $ac = $inputs['from_country'];
            $da = $inputs['to_airport'];
            $aa = $inputs['from_airport'];
        }
        else{
            $dc = $inputs['from_country'];
            $ac = $inputs['to_country'];
            $da = $inputs['from_airport'];
            $aa = $inputs['to_airport'];
        }
        $cn = $inputs['company_name'];
        if($flight_direction == 'oneway'){
            //Oneway flight
            $fd = $inputs['oneway_date'];
        }
        else if($flight_direction == "roundtrip_outbound"){
            //Outbound flight
            $fd = $inputs['roundtrip_start_date'];
        }
        else{ // "roundtrip_return"
            //Return flight
            $fd = $inputs['roundtrip_end_date'];
        }
        $data = [
            'departure_country' => $dc,
            'arrival_country' => $ac,
            'departure_airport' => $da,
            'departure_airport_lat' => A::AIRPORTS_LIST[$dc][$da]['lat'],
            'departure_airport_lon' => A::AIRPORTS_LIST[$dc][$da]['lon'],
            'arrival_airport' => $aa,
            'arrival_airport_lat' => A::AIRPORTS_LIST[$ac][$aa]['lat'],
            'arrival_airport_lon' => A::AIRPORTS_LIST[$ac][$aa]['lon'],
            'flight_date' => $fd,
            'adults' => $inputs['adults'],
            'teenagers' => $inputs['teenagers'],
            'children' => $inputs['children'],
            'newborns' => $inputs['newborns'],
            'company_name' => $cn,
            'days_before_discount' => A::DAYS_BEFORE_DISCOUNT_LIST[$cn],
            'age_bands' => A::AGE_BANDS[$cn],
            'timetable_daily_bands' => A::TIMETABLE_DAILY_BANDS[$cn],
            'timetable_hour_bands' => A::TIMETABLE_HOUR_BANDS[$cn],
            'timetable_days' => A::TIMETABLE_DAYS[$cn],
            'timetable_months' => A::TIMETABLE_MONTHS[$cn]
        ];
        //Log::channel('stdout')->info('setFlightPrice method data => '.var_export($data,true));
        return $data;
    }

    //set flight temp table records
    private function setFlightsTemp(array $flights_data): bool{
        //Log::debug("FlightSearchControllerCommonTrait setFlightsTemp");
        $set = false;
        $this->ftm = new FlightsTempManager($flights_data);
        $added = $this->ftm->addFlightsTemp();
        if($added)
            $set = true;
        return $set;
    }
}
?>