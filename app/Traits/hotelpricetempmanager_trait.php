<?php

namespace App\Traits;

use App\Models\HotelPriceTemp;

trait HotelPriceTempManagerTrait{

    use ErrorTrait;


    /**
     * Check if user with session id has shortly before done a hotel price preventive search
     * 
     * @param string the session id to search
     * @return bool true if the generate session id exists in the hotelpricetemp table
     * */
    private function checkHotelPriceRequests(string $session_id): bool{
        $hotelTemp = HotelPriceTemp::where('session_id',$session_id)->get();
        if($hotelTemp->count() > 0) return true;
        return false;
    }

    /**
     * Generate a random session id to identity the user that does the request
     */
    private function setSessionId(){
        $session_id = "";
        $classname = __CLASS__;
        $characters = 'aAbBcCdDeEfFGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';
        $length = strlen($characters);
        $exists = false;
        do{
            for($i = 0; $i < $classname::$random_times; $i++){
                $c = mt_rand(0, $length-1);
                $session_id .= $characters[$c];
            } 
            $exists = $this->checkHotelPriceRequests($session_id);
        }while($exists);
        $this->session_id = $session_id.time();
    }
}
?>