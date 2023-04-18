<?php

namespace App\Classes\Welcome;

use App\Exceptions\HotelPriceRequestArrayException;
use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Interfaces\Hotels as H;
use App\Interfaces\Welcome\HotelPriceErrors as Hpe;
use App\Traits\DateTrait;
use App\Traits\HotelPriceTrait;
use Illuminate\Support\Facades\Log;

class HotelPrice implements Hpe{
    use DateTrait, ErrorTrait, MmCommonTrait,HotelPriceTrait;

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
    private string $checkin;
    /**
     * The date of the check-out
     */
    private string $checkout;
    /**
     * The number of people that booked rooms in a hotel
     */
    private int $people;
    /**
     * The number of hotel rooms booked
     */
    private int $rooms;

    private float $fullPrice;

    public function __construct(array $data)
    {
        $this->assignValues($data);
        $this->calcPreventive();
    }

    public function getCountry(){return $this->country;}
    public function getCity(){return $this->city;}
    public function getHotel(){return $this->hotel;}
    public function getCheckin(){return $this->checkin;}
    public function getCheckout(){return $this->checkout;}
    public function getPeople(){return $this->people;}
    public function getRooms(){return $this->rooms;}
    public function getFullPrice(){return $this->fullPrice;}
    public function getError(){
        switch($this->errno){
            case Hpe::HOTELINFO_NOTFOUND:
                $this->error = Hpe::HOTELINFO_NOTFOUND_MSG;
                break;
            case Hpe::TOOMANYPEOPLE_FOR_ROOMS:
                $this->error = Hpe::TOOMANYPEOPLE_FOR_ROOMS_MSG;
                break;
            default:
                $this->error = null;
                break;
        }
    }

    private function assignValues(array $data){
        if(isset($data["checkin"],$data["checkout"],$data["city"],$data["country"],$data["hotel"],$data["people"],$data["rooms"])){
            $this->country = $data["country"];
            $this->city = $data["city"];
            $this->hotel = $data["hotel"];
            $this->checkin = $data["checkin"];
            $this->checkout = $data["checkout"];
            $this->people = $data["people"];
            $this->rooms = $data["rooms"];
        }//if(isset($data["checkin"],$data["checkout"],$data["city"],$data["country"],$data["hotel"],$data["people"],$data["rooms"])){
        else throw new HotelPriceRequestArrayException(Hpe::HOTELREQUESTARRAY_EXC);
    }

    /**
     * Calculate the prevenive of an hotel booking request
     */
    private function calcPreventive(){
        $this->errno = 0;
        $hotel_info = H::HOTELS_LIST[$this->country][$this->city][$this->hotel];
        if(isset($hotel_info)){
            $max_people = $hotel_info['max_people'];
            if($this->people > ($this->rooms * $max_people)){
                //Too many people for the number of rooms booked
                $this->errno = Hpe::TOOMANYPEOPLE_FOR_ROOMS;
            }//if($this->people > ($this->rooms * $max_people)){
            $price = $hotel_info['price'];
            $days = $this->dateDaysDifference($this->checkin,$this->checkout);
            $this->fullPrice = $this->rooms * $days * $price;
        }//if(isset($hotel_info)){
        else{
            $this->errno = Hpe::HOTELINFO_NOTFOUND;
        }
    }
}
?>