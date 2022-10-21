<?php

namespace app\Classes\Welcome;

use App\Exceptions\DatabaseInsertionException;
use App\Interfaces\Welcome\HotelPriceTempManagerError as Hptme;
use App\Models\HotelPriceTemp;
use App\Traits\HotelPriceTempManagerTrait;
use App\Traits\MmCommonTrait;

class HotelPriceTempManager implements Hptme{
    use MmCommonTrait, HotelPriceTempManagerTrait;

    private array $hotelpricetemp_array;
    private static int $random_times = 75;
    private ?string $session_id;

    public function __construct(array $data)
    {
        $this->hotelpricetemp_array = $data;
    }

    public function getHotelPriceTempArray(){return $this->hotelpricetemp_array;}
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
     * Add a new record in hotelpricetemp table
     */
    public function addHotelPriceTemp(){
        $hpt = new HotelPriceTemp;
        $hpt->session_id = $this->hotelpricetemp_array["session_id"];
        $hpt->country = $this->hotelpricetemp_array["country"];
        $hpt->city = $this->hotelpricetemp_array["city"];
        $hpt->hotel = $this->hotelpricetemp_array["hotel"];
        $hpt->ckeckin = $this->hotelpricetemp_array["ckeckin"];
        $hpt->checkout = $this->hotelpricetemp_array["checkout"];
        $hpt->rooms = $this->hotelpricetemp_array["rooms"];
        $hpt->people = $this->hotelpricetemp_array["people"];
        $hpt->price = $this->hotelpricetemp_array["price"];
        $save = $hpt->save();
        if(!$save) throw new DatabaseInsertionException(Hptme::HOTELPT_NEWROW_EXC);
    }


}
?>