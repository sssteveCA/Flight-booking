<?php

namespace App\Rules\Airports;

use App\Traits\Common\FlightSearchCommonTrait;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

//Check if airports value is inside specific array
class CheckAirports implements Rule,DataAwareRule
{
    use FlightSearchCommonTrait;

    private string $what_field; //Country field when check
    private $field_value; //what_field value
    protected $data;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $what_field)
    {
        $this->what_field = $what_field;
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
        $airports_array = $this->getAvailableAirportsArray()[$this->field_value];
        return array_key_exists($value,$airports_array);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Il valore di :attribute non è presente tra quelli possibili';
    }

    public function setData($data)
    {
        $this->field_value = $data[$this->what_field];
        return $this;
    }
}
