<?php

namespace App\Traits;

use App\Classes\Welcome\FlightPrice;
use DateTimeImmutable;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Welcome\FlightPriceErrors as Fpe;

//Trait for FlightPrice class
trait FlightPriceTrait{

    //Returns the month number and the day week name to get the subprices of these parameters
    private function getDateParams(string $date): array{
        //Log::channel('stdout')->debug('FlightPrice getDateParams');
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

     //get the distance from departure to arrival airport
     private function getDistance(): float{
        //Log::channel('stdout')->debug('FlightPrice getDistance');
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

    private function setDaysBefore(array $data): bool{
        //Log::channel('stdout')->debug('FlightPrice setDaysBefore');
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

    //Assign a random time hours minutes and then calculate the subprice based on hour getted
    private function setFlightHours(array $data){
        //Log::channel('stdout')->debug('FlightPrice setFlightHours');
        $tdb = $data['timetable_daily_bands'];
        $day_band_key = array_rand($tdb);
        $tdh = $data['timetable_hour_bands'];
        $hour_band_key = array_rand($tdh);
        $this->flight_time = $day_band_key.':'.$tdh[$hour_band_key].':00';
        $this->day_band_price = $this->distance * ($tdb[$day_band_key]);
    }

    //Set some subprices before calculate the total price
    private function setSubprices(array $data):bool{
        //Log::channel('stdout')->debug('FlightPrice setSubprices');
        $setted = false;
        $this->errno = 0;
        $ab = $data['age_bands'];
        $this->passengers_price = $this->distance * (($this->adults * $ab['adult']) + ($this->teenagers * $ab['teenager']) + ($this->children * $ab['child']) + ($this->newborns * $ab['newborn']));
        $this->setFlightHours($data);
        $date_params = $this->getDateParams($this->flight_date);
        //Log::channel('stdout')->debug('FlightPrice setSubprices date params array => '.var_export($date_params,true));
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

     //Validate input data
     private function validate(array $data):bool{
        //Log::channel('stdout')->debug('FlightPrice validate');
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

}
?>