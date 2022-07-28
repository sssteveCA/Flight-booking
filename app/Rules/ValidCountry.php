<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

//Check if value has a country that exists in the list
class ValidCountry implements Rule
{

    private array $countries;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $countries)
    {
        $this->countries = $countries;
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
        foreach($this->countries as $country => $airports){
            if($value == $country)
                return true;
        }//foreach($this->countries as $country => $airports){
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Il campo :attribute ha un valore non valido";
    }
}
