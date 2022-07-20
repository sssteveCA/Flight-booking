<?php

namespace App\Rules;

use DateTimeImmutable;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Support\Facades\Log;

class DateDiff1d implements Rule,ValidatorAwareRule,DataAwareRule
{

    private string $error_attribute;

    /**
     * All of the data under validation
     * 
     * @var array
     */
    protected $data = [];

    /**
     * The validator instance
     * 
     * @var \Illuminate\Validation\Validator
     */
    protected $validator;

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
        Log::channel('stdout')->debug("DateDiff1d passes");
        Log::channel('stdout')->debug("Attribute => {$attribute}");
        Log::channel('stdout')->debug("Value => ".var_export($value,true));
        if(isset($value) && $value != ''){
            if($attribute == 'oneway-date' || $attribute == 'roundtrip-start-date'){
                $date_ok = $this->oneDayDifference($value,date('Y-m-d'));
                if(!$date_ok)
                    $passes = false;
            }//if($attribute == 'oneway-date' || $attribute == 'roundtrip-start-date'){
            else if($attribute == 'roundtrip-end-date'){
                $date_ok = $this->oneDayDifference($value,$this->data['roundtrip-start-date']);
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
        Log::channel('stdout')->error("DateDiff1d message");
        Log::channel('stdout')->error(var_export($this->error_attribute,true));
        if($this->error_attribute == 'oneway-date' || $this->error_attribute == 'roundtrip-start-date'){
            return 'La :attribute deve essere maggiore di almeno 1 giorno rispetto alla data attuale';
        }
        else if($this->error_attribute == 'roundtrip-end-date'){
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
        Log::channel('stdout')->debug("DateDiff1d setData => ");
        Log::channel('stdout')->debug(var_export($this->data,true));
        return $this;
    }

    public function setValidator($validator)
    {
        $this->validator = $validator;
        return $this;
    }

    //Check if date1 is greater at least 1 day than date2
    private function oneDayDifference(string $date1, string $date2): bool{
        $oneDayGt = false;
        $date1_dt = DateTimeImmutable::createFromFormat('Y-m-d',$date1);
        $date2_dt = DateTimeImmutable::createFromFormat('Y-m-d',$date2);
        $diff = $date1_dt->diff($date2_dt);
        Log::channel('stdout')->info('diff => '.var_export($diff,true));
        if($diff->invert == 1 && $diff->d >= 1){
            $oneDayGt = true;
        }
        return $oneDayGt;
    }
}
