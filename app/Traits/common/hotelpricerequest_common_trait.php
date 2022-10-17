<?php

namespace App\Traits\Common;

use App\Rules\CheckHotelCity;
use App\Rules\IsInArray;
use App\Interfaces\Hotels as H;
use App\Rules\CheckHotel;
use App\Rules\DateDiff1dHotel;

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
            'hotel' => ['required', new CheckHotel(H::HOTELS_LIST)],
            'checkin' => ['required', 'date', new DateDiff1dHotel('checkin')],
            'checkout' => ['required', 'date', new DateDiff1dHotel('checkout')],
            'rooms' => ['required', 'integer','min:1'],
            'people' => []
        ];
    }

    public function messages(){
        return [
            'date' => "L'attributo :attribute deve essere una data valida",
            'integer' => "L'attributo :attribute deve essere un numero intero valido",
            "min" => "L'attributo :attribute deve avere un valore pari ad almeno :min",
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