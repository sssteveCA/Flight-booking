<?php

namespace App\Rules\CarRental;

use App\Traits\DateTrait;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class DateDiff1dCarRental implements Rule, DataAwareRule
{

    use DateTrait;

    private string $attribute_name;
    protected $data = [];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $attribute_name)
    {
        $this->attribute_name = $attribute_name;
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
        if($this->attribute_name == "rentstart"){
            $now_date = date('Y-m-d');
            return $this->oneDayDifference($value,$now_date);
        }
        else
            return $this->oneDayDifference($value,$this->data["rentstart"]);
            
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if($this->attribute_name == "rentstart"){
            return ':attribute deve essere almeno il giorno successivo di oggi';
        }
        else{

        }
        return ':attribute deve essere almeno il giorno successivo della data di ritiro';
    }
	/**
	 * Set the data under validation.
	 *
	 * @param array $data
	 * @return DataAwareRule
	 */
	public function setData($data) {
        $this->data = $data;
        return $this;
	}
}
