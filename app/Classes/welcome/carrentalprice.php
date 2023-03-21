<?php

namespace App\Classes;

use App\Traits\CarRentalPriceTrait;
use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use DateTimeImmutable;
use Illuminate\Support\Facades\Log;

class CarRentalPrice{

    private string $car_name;
    private string $company_name;
    private string $age_range;
    private string $rentstart_date;
    private string $rentend_date;
    /**
     * The array with all car rental data
     */
    private array $data;
    private float $total_price;

    use ErrorTrait, MmCommonTrait, CarRentalPriceTrait;

    public function __construct(array $data){
        Log::channel("CarRentalPrice construct data => ".var_export($data,true));
        $this->car_name = $data['car_name'];
        $this->company_name = $data['company_name'];
        $this->age_range = $data['age_range'];
        $this->rentstart_date = $data['rentstart_date'];
        $this->rentend_date = $data['rentend_date'];
        $this->calcPrice();
    }

    public function getCarName(){ return $this->car_name; }
    public function getCompanyName(){ return $this->company_name; }
    public function getAgeRange(){ return $this->age_range; }
    public function getRentStartDate(){ return $this->rentstart_date; }
    public function getRentEndDate(){ return $this->rentend_date; }
    public function getTotalPrice(){ return $this->total_price; }

    private function calcPrice(){
        $age_ranges = $this->data['age_ranges'];
        Log::channel("CarRentalPrice calcPrice age_ranges => ".var_export($age_ranges,true));
        $age_range_arr = explode("-", $this->age_range);
        $ar_key = array_search($age_range_arr,$age_ranges);
        Log::channel("CarRentalPrice calcPrice ar_key => ".var_export($ar_key,true));
        $company_arr = $this->data['companies_data'][$this->company_name];
        $car_arr = $this->data['companies_data'][$this->company_name]['cars'][$this->car_name];
        $price_company_part = $company_arr['day_price_30_65'] + ($company_arr['day_price_30_65'] * ($company_arr['day_price_additional_pcg
        '][$ar_key] / 100));
        Log::channel("CarRentalPrice calcPrice price_company_part => ".var_export($price_company_part,true));
        $price_car_part = $car_arr['day_price'] + ($car_arr['day_price'] * $company_arr['day_price_additional_pcg'][$ar_key] / 100);
        Log::channel("CarRentalPrice calcPrice price_car_part => ".var_export($price_car_part,true));
        $dti_rentstart = DateTimeImmutable::createFromFormat('Y-m-d',$this->rentstart_date);
        $dti_rentend = DateTimeImmutable::createFromFormat('Y-m-d',$this->rentend_date);
        $dti_diff = $dti_rentend->diff($dti_rentstart);
        Log::channel("CarRentalPrice calcPrice dti_diff => ".var_export($dti_diff,true));
        $this->total_price = ($price_company_part + $price_car_part) * $dti_diff;
        Log::channel("CarRentalPrice calcPrice total_price => ".var_export($this->total_price,true));
    }

}

?>