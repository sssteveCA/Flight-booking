<?php

namespace App\Traits;

use App\Models\FlightEventBookTemp;

trait FlightEventBookTempManagerTrait{

    use ErrorTrait;

     /**
     * Check if user with session id has shortly before done a flight event price preventive search
     * 
     * @param string the session id to search
     * @return bool true if the generate session id exists in the flighteventbooktemp table
     * */
    private function checkFlightEventPriceRequest(string $session_id): bool{
        $flightEventTemp = FlightEventBookTemp::where('session_id',$session_id)->get();
        if($flightEventTemp->count() > 0)return true;
        else return false;
    }

    /**
     * Generate a random session id to identify the user that does the request
     */
    private function setSessionId(){
        $session_id = "";
        $characters = 'aAbBcCdDeEfFGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';
        $length = strlen($characters);
        $exists = false;
        do{
            for($i = 0; $i < self::$random_times; $i++){
                $c = mt_rand(0, $length-1);
                $session_id .= $characters[$c];
            } 
            $exists = $this->checkFlightEventPriceRequest($session_id);
        }while($exists);
        $this->session_id = $session_id.time();
    }
}

?>