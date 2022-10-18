<?php

namespace App\Rules;

use App\Traits\DateTrait;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

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
        //
        if($attribute == 'checkin'){
            $days_diff = $this->dateDaysDifference(date('Y-m-d'),$value);
            if($days_diff >= 1) return true;
        }
        else if($attribute == 'ckeckout'){
            $days_diff = $this->oneDayDifference($this->data['checkin'],$value);
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
        return $this;
    }
}
