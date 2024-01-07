<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;

class FlightEventBookPrice{

    use ErrorTrait, MmCommonTrait;

    /**
     * Id of the event
     */
    private int $event_id;

    /**
     * Number of tickets to buy
     */
    private int $tickets;

    /**
     * The total price in €
     */
    private float $price;

    public function __construct(array $data){

    }

    public function getEventId(){ return $this->event_id; }
    public function getTickets(){ return $this->tickets; }
    public function getPrice(){ return $this->price; }
    public function getError(){
        switch($this->errno){
            default:
                $this->error = null;
                break;
        }
        return $this->error;
    }

    private function assignValues(array $data){
        if(isset($data['event_id'],$data['tickets'])){

        }
    }
}

?>