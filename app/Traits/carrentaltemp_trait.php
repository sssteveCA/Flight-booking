<?php

namespace App\Traits;

trait CarRentalTempTrait{

    use ErrorTrait;

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