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
        $this->data = $data['car_rental_array'];
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

}

?>