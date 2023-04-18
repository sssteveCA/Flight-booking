<?php

namespace App\Traits\Common;

use App\Classes\Welcome\FlightPrice;
use App\Interfaces\Constants as C;
use App\Classes\Welcome\FlightsTempManager;
use App\Interfaces\Airports as A;
use Exception;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * This trait is used to store common code in FlighSearchController & FlighSearchControllerApi
 */
trait FlightSearchCommonTrait{

    private FlightsTempManager $ftm;

    /**
     * Get the bookable airports with all the details
     * @return array
     */
    public function getAvailableAirports(Request $request): array{
        return $this->getAvailableAirportsArray();
    }

    protected function getAvailableAirportsArray(): array{
        return A::AIRPORTS_LIST;
    }

    /**
     * Get flight companies list
     */
    public function getFlightCompanies(){
        $list = $this->getFlightCompaniesList();
        return response()->json($list,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    protected function getFlightCompaniesList(): array{
        $list = A::COMPANIES_LIST;
        return $list;
    }
    
    protected function setFlightPriceArray(array $inputs, string $flight_direction): array{
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
        return $data;
    }

    /**
     * Get the array with the oneway flight information
     * @param FlightPrice $fl_oneway the object with the oneway information
     * @return array
     */
    private function onewayFlight(FlightPrice $fl_oneway): array{
        return [
            'oneway' => [
                'company_name' => $fl_oneway->company_name,
                'departure_country' => $fl_oneway->departure_country,
                'departure_airport' => $fl_oneway->departure_airport,
                'booking_date' => date('Y-m-d'),
                'flight_date' => $fl_oneway->flight_date,
                'flight_time' => $fl_oneway->flight_time,
                'arrival_country' => $fl_oneway->arrival_country,
                'arrival_airport' => $fl_oneway->arrival_airport,
                'adults' => $fl_oneway->adults,
                'teenagers' => $fl_oneway->teenagers,
                'children' => $fl_oneway->children,
                'newborns' => $fl_oneway->newborns,
                'flight_price' => $fl_oneway->flight_price_format
            ]
        ];
    }

    /**
     * Get the array with the roundtrip flights information
     * @param FlightPrice $fl_outbound the object with the outbound flight information
     * @param FlightPrice $fl_return the object with the return flight information
     * @return array
     */
    private function roundtripFlights(FlightPrice $fl_outbound, FlightPrice $fl_return): array{
        return [
            'outbound' => [
                'company_name' => $fl_outbound->company_name,
                'departure_country' => $fl_outbound->departure_country,
                'departure_airport' => $fl_outbound->departure_airport,
                'booking_date' => date('Y-m-d'),
                'flight_date' => $fl_outbound->flight_date,
                'flight_time' => $fl_outbound->flight_time,
                'arrival_country' => $fl_outbound->arrival_country,
                'arrival_airport' => $fl_outbound->arrival_airport,
                'adults' => $fl_outbound->adults,
                'teenagers' => $fl_outbound->teenagers,
                'children' => $fl_outbound->children,
                'newborns' => $fl_outbound->newborns,
                'flight_price' => $fl_outbound->flight_price_format
            ],
            'return' => [
                'company_name' => $fl_return->company_name,
                'departure_country' => $fl_return->departure_country,
                'departure_airport' => $fl_return->departure_airport,
                'booking_date' => date('Y-m-d'),
                'flight_date' => $fl_return->flight_date,
                'flight_time' => $fl_return->flight_time,
                'arrival_country' => $fl_return->arrival_country,
                'arrival_airport' => $fl_return->arrival_airport,
                'adults' => $fl_return->adults,
                'teenagers' => $fl_return->teenagers,
                'children' => $fl_return->children,
                'newborns' => $fl_return->newborns,
                'flight_price' => $fl_return->flight_price_format
            ]
        ];
    }

    /**
     * Set flight temp table records
     */
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