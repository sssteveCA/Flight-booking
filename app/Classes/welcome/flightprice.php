<?php

namespace App\Classes\Welcome;

use Illuminate\Support\Facades\Log;
use App\Interfaces\Welcome\FlightPriceErrors as Fpe;
use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Traits\FlightPriceTrait;
use DateTimeImmutable;

//This class calculates the price of selected flight
class FlightPrice implements Fpe{

    use ErrorTrait,MmCommonTrait,FlightPriceTrait;

    const MAX_LAT = 90;
    const MIN_LAT = -90;
    const MAX_LON = 180;
    const MIN_LON = -180;

    public string $departure_country;
    public string $arrival_country;
    public string $departure_airport;
    public float $departure_airport_lat;
    public float $departure_airport_lon;
    public string $arrival_airport;
    public float $arrival_airport_lat;
    public float $arrival_airport_lon;
    public string $flight_date;
    public int $adults;
    public int $teenagers;
    public int $children;
    public int $newborns;
    public string $company_name;
    public float $days_before_discount; //Percentage of discount for every day earlier the flight was booked

    public string $flight_time; //Flight hours (H:m)
    public float $distance; //Distance in coordinates between departure and arrival airport
    public float $passengers_price; //Subtotal price for number and type of passengers
    public float $day_band_price; //Subtotal price depending on day band the flight was booked
    public float $day_price;
    public float $month_price;
    public int $days_before; //Days before the flight was booked compared to the flight date
    public float $total_price;
    public string $total_price_format;
    
    public function __construct(array $data)
    {
        Log::channel('stdout')->debug('FlightPrice constructor');
        if(!$this->validate($data))
            throw new \Exception(Fpe::INVALIDDATA_EXC);
        $this->setValues($data);
        $this->calcPrice($data);
    }

    public function getError(){
        switch($this->errno){
            case Fpe::DATEFORMAT:
                $this->error = Fpe::DATEFORMAT_MSG;
                break;
            default:
                $this->error = null;
                break;
        }
        return $this->error;
    }

    //calculate flight price based on provided data
    private function calcPrice(array $data): bool{
        Log::channel('stdout')->debug('FlightPrice calcPrice');
        $calculated = false;
        $this->errno = 0;
        $this->getDistance();
        if($this->setSubprices($data)){
            //Subprices setted successfully
            if($this->setDaysBefore($data)){
                //Got days difference from the dates provided
                $subtotal = $this->passengers_price + $this->day_band_price + $this->day_price + $this->month_price;
                $subtotal_day_discount = $subtotal * ($this->days_before_discount/100);
                $this->total_price = $subtotal - ($subtotal_day_discount * $this->days_before);
                $this->total_price = round($this->total_price,2);
                $this->total_price_format = number_format($this->total_price,2,'.','');
                $calculated = true;
            }
        }//if($this->setSubprices($data)){
        return $calculated;
    }


    //Assign input data to properties if all values are valid
    private function setValues(array $data){
        Log::channel('stdout')->debug('FlightPrice setValues');
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
        $this->company_name = $data['company_name'];
        $this->days_before_discount = $data['days_before_discount'];
    }

    public function __debugInfo()
    {
        return [
            'departure_country' => $this->departure_country,
            'arrival_country' => $this->arrival_country,
            'departure_airport' => $this->departure_airport,
            'departure_airport_lat' => $this->departure_airport_lat,
            'departure_airport_lon' => $this->departure_airport_lon,
            'arrival_airport' => $this->arrival_airport,
            'arrival_airport_lat' => $this->arrival_airport_lat,
            'arrival_airport_lon' => $this->arrival_airport_lon,
            'flight_date' => $this->flight_date,
            'flight_time' => $this->flight_time,
            'adults' => $this->adults,
            'teenagers' => $this->teenagers,
            'children' => $this->children,
            'newborns' => $this->newborns,
            'company_name' => $this->company_name,
            'days_before_discount' => $this->days_before_discount,
            'distance' => $this->distance,
            'passengers_price' => $this->passengers_price,
            'day_band_price' => $this->day_band_price,
            'day_price' => $this->day_price,
            'month_price' => $this->month_price,
            'days_before' => $this->days_before,
            'month_price' => $this->month_price,
            'total_price' => $this->total_price,
        ];
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
        $this->adults = $properties['adults'];
        $this->teenagers = $properties['teenagers'];
        $this->children = $properties['children'];
        $this->newborns = $properties['newborns'];
        $this->distance = $properties['distance'];
        $this->passengers_price = $properties['passengers_price'];
        $this->day_band_price = $properties['day_band_price'];
        $this->day_price = $properties['day_price'];
        $this->month_price = $properties['month_price'];
        $this->days_before = $properties['days_before'];
        $this->total_price = $properties['total_price'];
        return $this;
    }

}
?>