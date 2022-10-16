<?php

namespace App\Traits\Common;

use App\Rules\CheckHotelCity;
use App\Rules\IsInArray;
use App\Interfaces\Hotels as H;

trait HotelPriceRequestCommonTrait{

    use HotelSearchControllerCommonTrait;

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
            'country' => ['required', new IsInArray($this->getCountriesList())],
            'city' => ['required', new CheckHotelCity(H::HOTELS_LIST)],
            'hotel' => 'required',
            'checkin' => ['required', 'date'],
            'checkout' => ['required', 'date'],
            'rooms' => ['required', 'integer']
        ];
    }

    public function messages(){
        return [
            'date' => "L'attributo :attribute deve essere una data valida",
            'integer' => "L'attributo :attribute deve essere un numero intero valido",
            'required' => "L'attributo :attribute è obbligatorio"
        ];
    }

    public function attributes(){
        return [
            'country' => 'paese',
            'city' => 'città',
            'hotel' => 'albergo',
            'checkin' => 'data di inizio soggiorno',
            'checkout' => 'data di fine soggiorno',
            'rooms' => 'stanze'
        ];
    }
}
?>