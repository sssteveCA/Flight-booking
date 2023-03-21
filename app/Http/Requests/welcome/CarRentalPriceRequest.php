<?php

namespace App\Http\Requests\welcome;

use Illuminate\Foundation\Http\FormRequest;

class CarRentalPriceRequest extends FormRequest
{
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
}
