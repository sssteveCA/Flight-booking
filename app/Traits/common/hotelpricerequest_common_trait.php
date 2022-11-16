<?php

namespace App\Traits\Common;

use App\Rules\CheckHotelCity;
use App\Rules\IsInArray;
use App\Interfaces\Hotels as H;
use App\Rules\CheckHotel;
use App\Rules\DateDiffHotel;

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
            'country' => ['required', new IsInArray(array_keys($this->getAvailableHotelsArray()))],
            'city' => ['required', new CheckHotelCity(H::HOTELS_LIST)],
            'hotel' => ['required', new CheckHotel(H::HOTELS_LIST)],
            'checkin' => ['required', 'date', new DateDiffHotel('checkin')],
            'checkout' => ['required', 'date', new DateDiffHotel('checkout')],
            'rooms' => ['required', 'integer','min:1'],
            'people' => ['required', 'integer', 'min:1','gte:rooms']
        ];
    }

    public function messages(){
        return [
            'date' => "L'attributo :attribute deve essere una data valida",
            'people' => [
                'gte' => "Il numero di persone deve essere maggiore o uguale alle stanze prenotate"
            ],
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
            'rooms' => 'stanze',
            'people' => 'numero di persone'
        ];
    }
}
?>