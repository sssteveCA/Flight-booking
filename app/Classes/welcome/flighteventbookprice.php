<?php

namespace App\Classes\Welcome;

class FlightEventBookPrice{

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
}

?>