<?php

namespace App\Rules\Hotels;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

/**
 * Check if declared hotel exists in a specific city, inside a specific country
 */
class CheckHotel implements Rule, DataAwareRule
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
            $city = $this->data['city'];
            $hotels = array_keys($this->hotels_array[$country][$city]);
            if(in_array($value,$hotels)){
                //Check if delcared hotel exists in a hotel list of a specific city
                return true;
            }//if(in_array($value,$hotels)){
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
        return ':attribute non esiste nella città o nel paese indicato';
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
