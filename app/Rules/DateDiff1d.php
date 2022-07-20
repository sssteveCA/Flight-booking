<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Support\Facades\Log;

class DateDiff1d implements Rule,ValidatorAwareRule,DataAwareRule
{

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
        Log::channel('stdout')->debug("DateDiff1d passes");
        Log::channel('stdout')->debug("Attribute => {$attribute}");
        Log::channel('stdout')->debug("Value => {$value}");
        return true;
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
}
