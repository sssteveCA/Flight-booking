<?php

namespace App\Classes\Welcome;

use Illuminate\Support\Facades\Log;
use App\Interfaces\Welcome\FlightPriceErrors as Fpe;
use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use DateTimeImmutable;

//This class calculates the price of selected flight
class FlightPrice implements Fpe{

    use ErrorTrait,MmCommonTrait;

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

    public string $hours; //Flight hours (H:m)
    public float $distance; //Distance in coordinates between departure and arrival airport
    public float $passengers_price; //Subtotal price for number and type of passengers
    public float $day_band_price; //Subtotal price depending on day band the flight was booked
    public float $day_price;
    public float $month_price;
    public int $days_before; //Days before the flight was booked compared to the flight date
    public float $total_price;
    
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
                $calculated = true;
            }
        }//if($this->setSubprices($data)){
        return $calculated;
    }

    private function getDateParams(string $date): array{
        Log::channel('stdout')->debug('FlightPrice getDateParams');
        $params = [];
        $date_obj = DateTimeImmutable::createFromFormat('Y-m-d',$date);
        if($date_obj !== false){
            //Date created successfully
            $uppercase_dayname = $date_obj->format('l');
            $params['day_week_name'] = strtolower($uppercase_dayname);
            $params['month_number'] = $date_obj->format('m');
        }
        return $params;
    }

    private function setDaysBefore(array $data): bool{
        Log::channel('stdout')->debug('FlightPrice setDaysBefore');
        $setted = false;
        $this->errno = 0;
        $date_now = date('Y-m-d'); //Now date
        $date_now_dt = DateTimeImmutable::createFromFormat('Y-m-d',$date_now);
        $date_flight_dt = DateTimeImmutable::createFromFormat('Y-m-d',$this->flight_date);
        if($date_now_dt !== false && $date_flight_dt !== false){
            $diff = $date_now_dt->diff($date_flight_dt,true);
            $this->days_before = $diff->d;
            $setted = true;
        }//if($date_now_dt !== false && $date_flight_dt !== false)
        else
            $this->errno = Fpe::DATEFORMAT;
        return $setted;
    }

     //get the distance from departure to arrival airport
     private function getDistance(): float{
        Log::channel('stdout')->debug('FlightPrice getDistance');
        $da_lat = $this->departure_airport_lat;
        $da_lon = $this->departure_airport_lon;
        $aa_lat = $this->arrival_airport_lat;
        $aa_lon = $this->arrival_airport_lon;
        if($da_lat >= 0 && $aa_lat >= 0){
            $lat_diff = abs($da_lat - $aa_lat);
        }
        else if($da_lat >= 0 && $aa_lat < 0){
            $lat_diff = $da_lat + abs($aa_lat);  
        }
        else if($da_lat < 0 && $aa_lat >= 0){
            $lat_diff = abs($da_lat) + $aa_lat;
        }
        else if($da_lat < 0 && $aa_lat < 0){
            $lat_diff = abs($da_lat - $aa_lat);
        }
        if($da_lon >= 0 && $aa_lon >= 0){
            $lon_diff = abs($da_lon - $aa_lon);
        }
        else if($da_lon >= 0 && $aa_lon < 0){
            $lon_diff_1 = $da_lon + abs($aa_lon);
            $lon_diff_2 = (FlightPrice::MAX_LON - $da_lon) + abs(FlightPrice::MIN_LON - $aa_lon);
            if($lon_diff_1 <= $lon_diff_2)
                $lon_diff = $lon_diff_1;
            else
                $lon_diff = $lon_diff_2;
        }
        else if($da_lon < 0 && $aa_lon >= 0){
            $lon_diff_1 = abs($da_lon) + $aa_lon;
            $lon_diff_2 = abs(FlightPrice::MIN_LON - $da_lon) + (FlightPrice::MAX_LON - $aa_lon);
            if($lon_diff_1 <= $lon_diff_2)
                $lon_diff = $lon_diff_1;
            else
                $lon_diff = $lon_diff_2;

        }
        else if($da_lon < 0 && $aa_lon < 0){
            $lon_diff = abs($da_lon - $aa_lon);
        }
        $distance = sqrt(pow($lat_diff,2) + (pow($lon_diff,2)));
        $this->distance = $distance;
        return $this->distance;
    }

    private function setFlightHours(array $data){
        Log::channel('stdout')->debug('FlightPrice setFlightHours');
        $tdb = $data['timetable_daily_bands'];
        $day_band_key = array_rand($tdb);
        $tdh = $data['timetable_hour_bands'];
        $hour_band_key = array_rand($tdh);
        $this->hours = $day_band_key.':'.$tdh[$hour_band_key];
        $this->day_band_price = $this->distance * ($tdb[$day_band_key]);
    }

    private function setSubprices(array $data):bool{
        Log::channel('stdout')->debug('FlightPrice setSubprices');
        $setted = false;
        $this->errno = 0;
        $ab = $data['age_bands'];
        $this->passengers_price = $this->distance * (($this->adults * $ab['adult']) + ($this->teenagers * $ab['teenager']) + ($this->children * $ab['child']) + ($this->newborns * $ab['newborn']));
        $this->setFlightHours($data);
        $date_params = $this->getDateParams($this->flight_date);
        Log::channel('stdout')->debug('FlightPrice setSubprices date params array => '.var_export($date_params,true));
        if(sizeof($date_params) > 0){
            //Array is not empty
            $td = $data['timetable_days'];
            $this->day_price = $this->distance * $td[$date_params['day_week_name']];
            $tm = $data['timetable_months'];
            $this->month_price = $this->distance * $tm[$date_params['month_number']];
            $setted = true;
        }//if(sizeof($date_params) > 0){
        else
            $this->errno = Fpe::DATEFORMAT;
        return $setted;
         
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

    //Validate input data
    private function validate(array $data):bool{
        Log::channel('stdout')->debug('FlightPrice validate');
        $valid = true;
        if(isset($data['departure_country'])){
            if(trim($data['departure_country']) == '')$valid = false;
        }
        else $valid = false;
        if(isset($data['arrival_country'])){
            if(trim($data['arrival_country']) == '')$valid = false;
        }
        else $valid = false;
        if(isset($data['departure_airport'])){
            if(trim($data['departure_airport']) == '')$valid = false;
        }
        else $valid = false;
        if(isset($data['departure_airport_lat'])){
            if(!is_numeric($data['departure_airport_lat']))$valid = false;
        }
        else $valid = false;
        if(isset($data['departure_airport_lon'])){
            if(!is_numeric($data['departure_airport_lon']))$valid = false;
        }
        else $valid = false;
        if(isset($data['arrival_airport'])){
            if(trim($data['arrival_country']) == '')$valid = false;
        }
        else $valid = false;
        if(isset($data['arrival_airport_lat'])){
            if(!is_numeric($data['arrival_airport_lat']))$valid = false;
        }
        else $valid = false;
        if(isset($data['arrival_airport_lon'])){
            if(!is_numeric($data['arrival_airport_lon']))$valid = false;
        }
        else $valid = false;
        if(isset($data['flight_date'])){
            if(trim($data['flight_date']) == '')$valid = false;
        }
        else $valid = false;
        if(isset($data['adults'])){
            if(!is_numeric($data['adults']))$valid = false;
        }
        else $valid = false;
        if(isset($data['teenagers'])){
            if(!is_numeric($data['teenagers']))$valid = false;
        }
        else $valid = false;
        if(isset($data['children'])){
            if(!is_numeric($data['children']))$valid = false;
        }
        else $valid = false;
        if(isset($data['newborns'])){
            if(!is_numeric($data['newborns']))$valid = false;
        }
        else $valid = false;
        if(isset($data['company_name'])){
            if(trim($data['company_name']) == '')$valid = false;
        }
        else $valid = false;
        if(isset($data['days_before_discount'])){
            if(!is_numeric($data['days_before_discount']))$valid = false;
        }
        return $valid;
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