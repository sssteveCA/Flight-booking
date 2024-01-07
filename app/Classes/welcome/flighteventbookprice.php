<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Interfaces\Welcome\FlightEventBookPriceErrors as Febpe;
use App\Models\FlightEvent;
use App\Exceptions\FlightEventBookPriceRequestArrayException;

class FlightEventBookPrice implements Febpe{

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
        $this->assignValues($data);
        $this->calcPrice();
    }

    public function getEventId(){ return $this->event_id; }
    public function getTickets(){ return $this->tickets; }
    public function getPrice(){ return $this->price; }
    public function getError(){
        switch($this->errno){
            case Febpe::FLIGHTEVENT_NOTFOUND:
                $this->error = Febpe::FLIGHTEVENT_NOTFOUND_MSG;
                break;
            default:
                $this->error = null;
                break;
        }
        return $this->error;
    }

    private function assignValues(array $data){
        if(isset($data['event_id'],$data['tickets'])){
            $this->event_id = $data['event_id'];
            $this->tickets = $data['tickets'];
        }
        else throw new FlightEventBookPriceRequestArrayException(Febpe::FLIGHTEVENTBOOKREQUESTARRAY_EXC);
    }

    /**
     * Calculate the total price fot the selected event
     */
    private function calcPrice(){

        $fe = FlightEvent::find($this->event_id);
        if($fe){
            $ticketPrice = $fe->price;
            $totalPrice = $ticketPrice * $this->tickets;
            $this->price = number_format($totalPrice,2,".","");
        }
        else{
            $this->errno = Febpe::FLIGHTEVENT_NOTFOUND;
        }
    }
}

?>