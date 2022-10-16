<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

/**
 * Check if a city is present in the selected country
 */
class CheckHotelCity implements Rule, DataAwareRule
{

    protected $data = [];
    private array $hotels_array;


    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $hotels_array)
    {
        $this->hotels_array = $hotels_array;
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
        $country = $this->data['country'];
        $cities = array_keys($this->hotels_array[$country]);
        if(count($cities) > 0){
            if(in_array($value,$cities)){
                //Check if the city is in list of declared country
                return true;
            }//if(in_array($value,$cities)){
        }//if(count($cities) > 0){
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
