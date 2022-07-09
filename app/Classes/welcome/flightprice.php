<?php

namespace App\Classes\Welcome;

use Illuminate\Support\Facades\Log;


//This class calculates the price of selected flight
class FlightPrice{

    public string $departure_country;
    public string $arrival_country;
    public string $departure_airport;
    public float $departure_airport_lat;
    public float $departure_airport_lon;
    public string $arrival_airport;
    public float $arrival_airport_lat;
    public float $arrival_airport_lon;
    public string $flight_date;
    public string $flight_id;
    public int $adults;
    public int $teenagers;
    public int $children;
    public int $newborns;
    public float $price;

    public array $age_bands;
    public array $airports_list;
    public array $companies_list;
    public float $days_before_discount;
    public array $timetable_daily_bands;
    public array $timetable_days;
    public array $timetable_months;

    
    public function __construct(array $data)
    {
        
    }
    
    //Validate input data
    private function validate(array $data):bool{
        $valid = true;
        return $valid;
    }

    //Assign input data to properties if all values are valid
    private function setValues(array $data){
        $this->departure_country = $data['departure_country'];
        $this->arrival_country = $data['arrival_country'];
        $this->departure_airport = $data['departure_airport'];
        $this->departure_airport_lat = $data['departure_airport_lat'];
        $this->departure_airport_lon = $data['departure_airport_lon'];
        $this->arrival_airport = $data['arrival_airport'];
        $this->arrival_airport_lat = $data['arrival_airport_lat'];
        $this->arrival_airport_lon = $data['arrival_airport_lon'];
        $this->flight_date = $data['flight_date'];
        $this->adults = $data['adults'];
        $this->teenagers = $data['teenagers'];
        $this->children = $data['children'];
        $this->newborns = $data['newborns'];
        $this->age_bands = $data['age_bands'];
        $this->airports_list = $data['airports_list'];
        $this->companies_list = $data['companies_list'];
        $this->days_before_discount = $data['days_before_discount'];
        $this->timetable_daily_bands = $data['timetable_daily_bands'];
        $this->timetable_days = $data['newborns'];
        $this->timetable_months = $data['timetable_months'];
    }


    public function __call($name, $arguments)
    {
        Log::channel('stdout')->error("Il metodo {$name} non esiste in FlightPrice");
    }

    public function __debugInfo()
    {

    }

    public function __get($name)
    {
        Log::channel('stdout')->error("La proprietà {$name} non esiste in FlightPrice");
    }

    public function __set_state($properties)
    {
        $this->departure_country = $properties['departure_country'];
        $this->arrival_country = $properties['arrival_country'];
        $this->departure_airport = $properties['departure_airport'];
        $this->departure_airport_lat = $properties['departure_airport_lat'];
        $this->departure_airport_lon = $properties['departure_airport_lon'];
        $this->arrival_airport = $properties['arrival_airport'];
        $this->arrival_airport_lat = $properties['arrival_airport_lat'];
        $this->arrival_airport_lon = $properties['arrival_airport_lon'];
        $this->flight_date = $properties['flight_date'];
        $this->flight_id = $properties['flight_id'];
        $this->adults = $properties['adults'];
        $this->teenagers = $properties['teenagers'];
        $this->children = $properties['children'];
        $this->newborns = $properties['newborns'];
        $this->price = $properties['price'];
        return $this;
    }

    public function __toString()
    {
        return "Oggetto di tipo FlightPrice";
    }

}
?>