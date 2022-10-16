<?php

namespace App\Rules;

use App\Traits\DateTrait;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class DateDiff1dHotel implements Rule, DataAwareRule
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
            $one_day = $this->oneDayDifference($value,date('Y-m-d'));
            if($one_day) return true;
        }
        else if($attribute == 'ckeckout'){
            $one_day = $this->oneDayDifference($value, $this->data['checkin']);
            if($one_day) return true;
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
