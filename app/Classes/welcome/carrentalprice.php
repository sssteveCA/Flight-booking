<?php

namespace App\Classes;

use App\Traits\CarRentalPriceTrait;
use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;

class CarRentalPrice{

    private string $car_name;
    private string $company_name;
    private string $age_range;

    use ErrorTrait, MmCommonTrait, CarRentalPriceTrait;

    public function __construct(array $data){
        $this->car_name = $data['car_name'];
        $this->company_name = $data['company_name'];
        $this->age_range = $data['age_range'];
    }

    public function getCarName(){ return $this->car_name; }
    public function getCompanyName(){ return $this->company_name; }
    public function getAgeRange(){ return $this->age_range; }

}

?>