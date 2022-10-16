<?php

namespace App\Traits\Common;

trait HotelPriceRequestCommonTrait{

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
            'country' => 'required',
            'city' => 'required',
            'hotel' => 'required',
            'checkin' => ['required', 'date'],
            'checkout' => ['required', 'date'],
            'rooms' => ['required', 'integer']
        ];
    }
}
?>