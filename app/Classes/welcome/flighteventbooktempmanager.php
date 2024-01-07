<?php

namespace App\Classes;

use App\Exceptions\DatabaseInsertionException;
use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;

class FlightEventBookTempManager{
    
    use MmCommonTrait;

    private array $flighteventbooktemp_array;
    private static int $random_times = 75;
    private ?string $session_id;

    public function __construct(array $data){
        $this->flighteventbooktemp_array = $data;
    }

    public function getFlightEventBookTempArray(): array{ return $this->flighteventbooktemp_array; }
    public function getSessionId(){return $this->session_id;}
    public function getError(){
        switch($this->errno){
            default:
                $this->error = null;
                break;
        }
        return $this->error;
    }
}

?>