<?php

namespace App\Rules\Hotels;

use App\Traits\DateTrait;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class DateDiffHotel implements Rule, DataAwareRule
{
    use DateTrait;

    private string $error_attribute;
    protected $data = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $error_attribute)
    {
        //Log::channel('stdout')->info("FateDiffHotel constructor error attribute => ".var_export($error_attribute,true));
        $this->error_attribute = $error_attribute;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //Log::channel('stdout')->info("DateDiffHotel passes attribute => ".var_export($attribute,true));
        //
        if($attribute == 'checkin'){
            $days_diff = $this->dateDaysDifference(date('Y-m-d'),$value);
            //Log::channel('stdout')->info("DateDiffHotel passes checkin days diff => ".var_export($days_diff,true));
            if($days_diff >= 1) return true;
        }
        else if($attribute == 'checkout'){
            $days_diff = $this->dateDaysDifference($this->data['checkin'],$value);
            //Log::channel('stdout')->info("DateDiffHotel passes checkout data checkin => ".var_export($this->data['checkin'],true));
            //Log::channel('stdout')->info("DateDiffHotel passes checkout days diff => ".var_export($days_diff,true));
            if($days_diff >= 1)return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if($this->error_attribute == 'checkin'){
            return 'La :attribute deve essere maggiore di almeno un giorno, rispetto a quella attuale';
        }
        else if($this->error_attribute == 'checkout'){
            return 'La :attribute deve essere maggiore di almeno un giorno, rispetto alla data del checkin';
        }
    }

    public function setData($data)
    {
        $this->data = $data;
        //Log::channel('stdout')->debug("DateDiffHotel setData => ".var_export($this->data,true));
        return $this;
    }
}
