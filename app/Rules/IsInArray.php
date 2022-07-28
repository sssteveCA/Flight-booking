<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

//Check if value is inside specified array
class IsInArray implements Rule
{

    private array $list;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $list)
    {
        $this->list = $list;
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
        $present = in_array($value,$this->list);
        return $present;
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
}
