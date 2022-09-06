<?php

namespace App\Traits\Common;

use App\Rules\DateDiff1d;
use App\Rules\NotSameLocation;
use App\Interfaces\Airports as A;
use App\Rules\CheckAirports;
use App\Rules\IsInArray;
use App\Rules\ValidCountry;
use App\Traits\Common\FlightSearchCommonTrait;

//Ths trait is used to put common code for FlightPriceRequest & FlightPriceRequestApi
trait FlightPriceRequestCommonTrait{

    use FlightSearchCommonTrait;

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
            'flight_type' => 'required',
            'company_name' => ['required',new IsInArray($this->getFlightCompaniesList())],
            'from' => ['required', new NotSameLocation,new IsInArray($this->getCountriesList())],
            'from_airport' => ['required',new CheckAirports('from')],
            'to' => ['required',new IsInArray($this->getCountriesList())],
            'to_airport' => ['required',new CheckAirports('to')],
            'oneway_date' => ['required_without_all:roundtrip_start_date,roundtrip_end_date', new DateDiff1d('oneway_date')],
            'roundtrip_start_date' => ['required_with:roundtrip_end_date', new DateDiff1d('roundtrip_start_date')],
            'roundtrip_end_date' => ['required_with:roundtrip_start_date', new DateDiff1d('roundtrip_end_date')],
            'adults' => ['required','integer','min:1'],
            'teenagers' => ['required','integer','min:0'],
            'children' => ['required','integer','min:0'],
            'newborns' => ['required','integer','min:0'],
        ];
        
    }

    public function messages(){
        return [
            'integer' => "L'attributo :attribute deve contenere un numero intero valido",
            'required' => "L'attributo :attribute è obbligatorio",
            'oneway_date.required_without_all' => 'Inserisci la data di partenza',
            'rountrip-start-date.required_with' => 'Inserisci anche la data per il volo di ritorno',
            'rountrip-end-date.required_with' => 'Inserisci anche la data per il volo di partenza',
            'adults.min' => 'Il numero minimo di adulti deve essere 1',
            'teenagers.min' => 'Il numero di adolescenti non può essere negativo',
            'children.min' => 'Il numero di bambini non può essere negativo',
            'newborns.min' => 'Il numero di neonati non può essere negativo',
        ];
    }

    public function attributes()
    {
        return [
            'flight_type' => 'tipo di volo',
            'company_name' => 'compagnia aerea',
            'from' => 'paese di partenza',
            'from_airport' => 'aereoporto di partenza',
            'to' => 'paese di destinazione',
            'to_airport' => 'aereoporto di destinazione',
            'oneway_date' => 'data del volo di partenza',
            'roundtrip_start_date' => 'data del volo di partenza',
            'roundtrip_end_date' => 'data del volo di ritorno',
            'adults' => 'numero di adulti',
            'teenagers' => 'numero di adolescenti',
            'children' => 'numero di bambini',
            'newborns' => 'numero di neonati',
        ];
    }
}
?>