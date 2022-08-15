<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Interfaces\Welcome\FlightsTempManagerErrors as Ftme;
use App\Models\FlightTemp;
use App\Traits\Common\FlightsTempManagerCommonTrait;
use Illuminate\Support\Facades\Log;

class FlightsTempManager implements Ftme{
    use MmCommonTrait, FlightsTempManagerCommonTrait;


    public function __construct(array $data)
    {
        Log::channel('stdout')->info("FlightsTempManager construct data => ".var_export($data,true));
        $this->checkFlightsArray($data);
        $this->flights_array = $data;
    }

    public function getError(){
        switch($this->errno){
            case Ftme::NOTADDED:
                $this->error = Ftme::NOTADDED_MSG;
                break;
            case Ftme::NOTDELETED:
                $this->errno = Ftme::NOTDELETED_MSG;
                break;
            default:
                $this->error = null;
                break;
        }
        return $this->error;
    }

    //Add a new flight temp records
    public function addFlightsTemp(): bool{
        Log::channel('stdout')->info("FlightsTempManager addFlightsTemp");
        $add = false;
        $this->setSessionId();
        if($this->flights_array_lenght == 1){
            //Oneway ticket
            $addflighttemp_data = [
                'session_id' => $this->session_id,
                'flight_type' => 'oneway',
                'flight_direction' => 'outbound'
            ];
            $add_outbound = $this->addFlightTemp($addflighttemp_data,'oneway');
            if($add_outbound)
                $add = true;
            else
                $this->errno = Ftme::NOTADDED;
        }//if($this->flights_array_lenght == 1){
        else if($this->flights_array_lenght == 2){
            //Roundtrip ticket
            $addflighttemp_data = [
                'session_id' => $this->session_id,
                'flight_type' => 'roundtrip',
                'flight_direction' => 'outbound'
            ];
            $add_outbound = $this->addFlightTemp($addflighttemp_data,'outbound');
            if($add_outbound){
                $addflighttemp_data['flight_direction'] = 'return';
                $add_return = $this->addFlightTemp($addflighttemp_data,'return');
                if($add_return)
                    $add = true;
                else
                    $this->errno = Ftme::NOTADDED;
            }//if($add_outbound){
            else
                $this->errno = Ftme::NOTADDED;
        }//else if($this->flights_array_lenght == 2){
        else
            $this->errno = Ftme::NOTADDED;
        return $add;
    }

}
?>