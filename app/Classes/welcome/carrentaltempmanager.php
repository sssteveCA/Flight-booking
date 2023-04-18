<?php

namespace App\Classes\Welcome;

use App\Exceptions\DatabaseInsertionException;
use App\Models\CarRentalTemp;
use App\Traits\CarRentalTempTrait;
use App\Traits\MmCommonTrait;
use App\Interfaces\Welcome\CarRentalTempManagerErrors as Crtme;

class CarRentalTempManager implements Crtme{
    use MmCommonTrait, CarRentalTempTrait;

    private array $carrentalpricetemp_array;
    private static int $random_times = 75;
    private ?string $session_id;

    public function __construct(array $data)
    {
        $this->carrentalpricetemp_array = $data;
    }

    public function getCarRentalPriceTempArray(){return $this->carrentalpricetemp_array;}
    public function getSessionId(){return $this->session_id;}
    public function getError(){
        switch($this->errno){
            default:
                $this->error = null;
                break;
        }
        return $this->error;
    }

    /**
     * Add a new record in carrentaltemp table
     */
     public function addCarRentalTemp(){
        $this->setSessionId();
        $cpt = new CarRentalTemp;
        $cpt->session_id = $this->session_id;
        $cpt->car_name = $this->carrentalpricetemp_array['car_name'];
        $cpt->company_name = $this->carrentalpricetemp_array['company_name'];
        $cpt->age_range = $this->carrentalpricetemp_array['age_range'];
        $cpt->rentstart_date = $this->carrentalpricetemp_array['rentstart_date'];
        $cpt->rentend_date = $this->carrentalpricetemp_array['rentend_date'];
        $cpt->price = $this->carrentalpricetemp_array['price'];
        $save = $cpt->save();
        if(!$save) throw new DatabaseInsertionException(Crtme::CARRENTALT_NEWROW_EXC);
     }
}
?>