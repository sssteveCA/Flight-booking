<?php

namespace App\Http\Requests\welcome;

use Illuminate\Foundation\Http\FormRequest;

class CarRentalPriceRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;

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
            'rent_company' => ['required'],
            'car' => ['required'],
            'pickup_country' => ['required'],
            'pickup_location' => ['required'],
            'delivery_country' => ['required'],
            'delivery_location' => ['required'],
            'age_range' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'required' => "L'attributo :attribute è obbligatorio"
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
            'age_range' => 'Fascia d\'età'
        ];
    }
}
