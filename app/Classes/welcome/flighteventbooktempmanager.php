<?php

namespace App\Classes;

use App\Exceptions\DatabaseInsertionException;
use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Traits\FlightEventBookTempManagerTrait;
use App\Models\FlightEventBookTemp;
use App\Interfaces\Welcome\FlightEventBookTempManagerErrors as Febtme;

class FlightEventBookTempManager implements Febtme{
    
    use MmCommonTrait, FlightEventBookTempManagerTrait;

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

    /**
     * Add a new record in flighteventbooktemp table
     */
    public function addFlightEventBookTemp(){
        $this->setSessionId();
        $febt = new FlightEventBookTemp;
        $febt->session_id = $this->session_id;
        $febt->event_id = $this->flighteventbooktemp_array['event_id'];
        $febt->tickets = $this->flighteventbooktemp_array['tickets'];
        $febt->price = $this->flighteventbooktemp_array['price'];
        $save = $febt->save();
        if(!$save) throw new DatabaseInsertionException(Febtme::FLIGHTEVENTBOOKT_NEWROW_EXC);

    }
}

?>