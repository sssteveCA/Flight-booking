<?php

namespace App\Rules\Airports;

use App\Traits\DateTrait;
use DateTimeImmutable;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Support\Facades\Log;

class DateDiff1d implements Rule,DataAwareRule
{

    use DateTrait;

    private string $error_attribute;

    /**
     * All of the data under validation
     * 
     * @var array
     */
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
        $passes = true;
        if(isset($value) && $value != ''){
            if($attribute == 'oneway_date' || $attribute == 'roundtrip_start_date'){
                $date_ok = $this->oneDayDifference($value,date('Y-m-d'));
                if(!$date_ok)
                    $passes = false;
            }//if($attribute == 'oneway_date' || $attribute == 'roundtrip_start_date'){
            else if($attribute == 'roundtrip_end_date'){
                $date_ok = $this->oneDayDifference($value,$this->data['roundtrip_start_date']);
                if(!$date_ok)
                    $passes = false;  
            }
        }//if(isset($value)){
        return $passes;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if($this->error_attribute == 'oneway_date' || $this->error_attribute == 'roundtrip_start_date'){
            return 'La :attribute deve essere maggiore di almeno 1 giorno rispetto alla data attuale';
        }
        else if($this->error_attribute == 'roundtrip_end_date'){
            return 'La :attribute deve essere maggiore di almeno 1 giorno rispetto alla data del volo di partenza';
        }  
    }

    /**
     * Set the data under validation
     * 
     * @param array $data
     * @return $this
     */
    public function setData($data){
        $this->data = $data;
        return $this;
    }
}
