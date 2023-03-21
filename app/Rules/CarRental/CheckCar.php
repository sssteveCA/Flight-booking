<?php

namespace App\Rules\CarRental;

use App\Traits\Common\CarRentalPriceRequestCommonTrait;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

/**
 * Summary of CheckCar
 */
class CheckCar implements Rule, DataAwareRule
{

    use CarRentalPriceRequestCommonTrait;

    private string $company_field;
    protected $data = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $company_field)
    {
        $this->company_field = $company_field;
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
        return in_array($value, $this->getCompanyCarsList($this->data[$this->company_field]));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'L\' auto indicata non è presente nella compagnia di noleggio selezionata';
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
