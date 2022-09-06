<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

//This rule check if the departure location is different from the arrival location
class NotSameLocation implements Rule,DataAwareRule
{

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
    public function __construct()
    {
        //
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
        //True if contries and airports are different
        $country_diff = ($this->data['from_country'] != $this->data['to']);
        $airport_diff = ($this->data['from_airport'] != $this->data['to_airport']);
        //True if the departure location is different from the arrival location
        if($country_diff || $airport_diff)
            return true;
        else 
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Il luogo di destinazione non può essere uguale al luogo di partenza';
    }

    /**
     * Set the data under validation
     * 
     * @param array $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
