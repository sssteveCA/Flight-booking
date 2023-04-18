<?php

namespace App\Traits;
use DateTimeImmutable;
use Illuminate\Support\Facades\Log;

trait CarRentalPriceTrait{
    
    private function calcPrice(){
        $age_ranges = $this->data['age_ranges'];
        $age_range_arr = explode("-", $this->age_range);
        $ar_key = array_search($age_range_arr,$age_ranges);
        $company_arr = $this->data['companies_data'][$this->company_name];
        $car_arr = $this->data['companies_data'][$this->company_name]['cars'][$this->car_name];
        $price_company_part = $company_arr['day_price_30_65'] + ($company_arr['day_price_30_65'] * ($company_arr['day_price_additional_pcg'][$ar_key] / 100));
        $price_car_part = $car_arr['day_price'] + ($car_arr['day_price'] * $company_arr['day_price_additional_pcg'][$ar_key] / 100);
        $dti_rentstart = DateTimeImmutable::createFromFormat('Y-m-d',$this->rentstart_date);
        $dti_rentend = DateTimeImmutable::createFromFormat('Y-m-d',$this->rentend_date);
        $dti_diff = $dti_rentend->diff($dti_rentstart);
        $this->total_price = ($price_company_part + $price_car_part) * (float)$dti_diff->d;
    }
}

?>