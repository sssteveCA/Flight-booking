<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Interfaces\Hotels as H;
use App\Interfaces\Welcome\HotelPriceErrors as Hpe;
use App\Traits\HotelPriceTrait;

class HotelPrice implements Hpe{
    use ErrorTrait, MmCommonTrait,HotelPriceTrait;

    /**
     * The country which the hotel is situated
     */
    private string $country;
    /**
     * The city which the hotel is situated
     */
    private string $city;
    /**
     * The hotel name
     */
    private string $hotel;
    /**
     * The date of the check-in
     */
    private string $checkinDate;
    /**
     * The date of the check-out
     */
    private string $checkoutDate;
    /**
     * The number of people that booked rooms in a hotel
     */
    private int $people;
    /**
     * The number of hotel rooms booked
     */
    private int $rooms;

    private array $hotelPriceInputs;

    private float $fullPrice;

    public function __construct(array $data)
    {
        $this->assignValues($data);
    }

    public function getCountry(){return $this->country;}
    public function getCity(){return $this->city;}
    public function getHotel(){return $this->hotel;}
    public function getCheckinDate(){return $this->checkinDate;}
    public function getCheckoutDate(){return $this->checkoutDate;}
    public function getPeople(){return $this->people;}
    public function getRooms(){return $this->rooms;}
    public function getFullPrice(){return $this->fullPrice;}
    public function getHotelPriceInputs(){return $this->hotelPriceInputs;}

    private function assignValues(array $data){
        $this->hotelPriceInputs = $this->data;
    }

    /**
     * Calculate the prevenive of an hotel booking request
     */
    private function calcPreventive(){
        $this->errno = 0;
    }
}
?>