<?php

namespace App\Traits\Common;

use App\Rules\CarRental\CheckCar;
use App\Rules\CarRental\DateDiff1dCarRental;
use App\Rules\IsInArray;

trait CarRentalPriceRequestCommonTrait{

    use CarRentalSearchControllerCommonTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rent_company' => ['required', new IsInArray($this->getCompaniesList())],
            'car' => ['required', new CheckCar('rent_company')],
            'pickup_country' => ['required'], new IsInArray($this->getCountriesList()),
            'pickup_location' => ['required'],
            'delivery_country' => ['required', new IsInArray($this->getCountriesList())],
            'delivery_location' => ['required'],
            'rentstart' => ['required','date', new DateDiff1dCarRental('rentstart')],
            'rentend' => ['required','date', new DateDiff1dCarRental('rentend')],
            'age_range' => ['required', new IsInArray($this->getAgeRangesList())]
        ];
    }

    public function messages()
    {
        return [
            'required' => "L'attributo :attribute è obbligatorio",
            'date' => "L'attributo :attribute deve essere una data"
        ];
    }

    public function attributes()
    {
        return [
            'rent_company' => 'Compagnia di noleggio',
            'car' => 'Modello di automobile',
            'pickup_country' => 'Paese di ritiro',
            'pickup_location' => 'Località di ritiro',
            'delivery_country' => 'Paese di consegna',
            'delivery_location' => 'Località di consegna',
            'age_range' => 'Fascia d\'età',
            'rentstart' => 'Data di ritiro',
            'rentend' => 'Data di consegna'
        ];
    }
}
?>