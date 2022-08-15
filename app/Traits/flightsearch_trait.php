<?php

namespace App\Traits;

use App\Classes\Welcome\FlightTempManager;
use App\Interfaces\Airports as A;
use Illuminate\Support\Facades\Log;

//Trait for FlightSearchController
trait FlightSearchTrait{

    private FlightTempManager $ftm;

    protected function getAirportsList(string $country): array{
        $list = [];
        $airports = A::AIRPORTS_LIST;
        $key_exists = array_key_exists($country,$airports);
        if($key_exists){
            $list = $airports[$country];
        }
        return $list;
    }

    protected function getCountriesList(): array{
        $list = [];
        $airports = A::AIRPORTS_LIST;
        $list = array_keys($airports);
        return $list;
    }

    protected function getFlightCompaniesList(): array{
        $list = A::COMPANIES_LIST;
        return $list;
    }
    
    protected function setFlightPriceArray(array $inputs, string $flight_direction): array{
        //Log::channel('stdout')->info('setFlightPrice method');
        if($flight_direction == 'roundtrip_return'){
            $dc = $inputs['to'];
            $ac = $inputs['from'];
            $da = $inputs['to-airport'];
            $aa = $inputs['from-airport'];
        }
        else{
            $dc = $inputs['from'];
            $ac = $inputs['to'];
            $da = $inputs['from-airport'];
            $aa = $inputs['to-airport'];
        }
        $cn = $inputs['company_name'];
        if($flight_direction == 'oneway'){
            //Oneway flight
            $fd = $inputs['oneway-date'];
        }
        else if($flight_direction == "roundtrip_outbound"){
            //Outbound flight
            $fd = $inputs['roundtrip-start-date'];
        }
        else{ // "roundtrip_return"
            //Return flight
            $fd = $inputs['roundtrip-end-date'];
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
}
?>