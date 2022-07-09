<?php

namespace App\Classes\Welcome;

use Illuminate\Support\Facades\Log;


//This class calculates the price of selected flight
class FlightPrice{
    private array $age_bands = array();
    private array $aiports_list = array();
    private float $days_before_discount;
    private array $timetable_daily_bands = array();
    private array $timetable_days = array();
    private array $timetable_months = array();
    
    public function __construct(array $data)
    {
        
    }

    public function __call($name, $arguments)
    {
        Log::channel('stdout')->error("Il metodo {$name} non esiste in FlightPrice");
    }

    public function __debugInfo()
    {
        return [
            'age_bands' => $this->age_bands,
            'airports_list' => $this->airports_list,
            'days_before_discount' => $this->days_before_discount,
            'timetable_daily_bands' => $this->timetable_daily_bands,
            'timetable_days' => $this->timetable_days,
            'timetable_months' => $this->timetable_months,
        ];
    }

    public function __get($name)
    {
        Log::channel('stdout')->error("La proprietà {$name} non esiste in FlightPrice");
    }

    public function __set_state($properties)
    {
        $this->age_bands = $properties['age_bands'];
        $this->airports_list = $properties['airports_list'];
        $this->days_before_discount = $properties['days_before_discount'];
        $this->timetable_daily_bands = $properties['timetable_daily_bands'];
        $this->timetable_days = $properties['timetable_days'];
        $this->timetable_months = $properties['timetable_months'];
        return $this;
    }

    public function __toString()
    {
        return "Oggetto di tipo FlightPrice";
    }

    public function getAgeBands(){return $this->age_bands;}
    public function getAirports(){return $this->aiports_list;}
    public function getDaysBeforeDiscount(){return $this->days_before_discount;}
    public function getTtDailyBands(){return $this->timetable_daily_bands;}
    public function getTtDays(){return $this->timetable_days;}
    public function getTtMonths(){return $this->timetable_months;}

}
?>