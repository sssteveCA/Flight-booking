<?php

namespace App\Http\Requests\welcome;

use App\Interfaces\Paths as P;
use Illuminate\Foundation\Http\FormRequest;

class FlightPriceRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;
    protected $redirect = P::URL_ROOT;
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
            'flight-type' => 'required',
            'from' => 'required',
            'from-airport' => 'required',
            'to' => 'required',
            'to-airport' => 'required',
            'oneway-date' => 'required_without_all:roundtrip-start-date,roundtri-end-date',
            'roundtrip-start-date' => 'required_with:roundtrip-end-date',
            'roundtrip-end-date' => 'required_with:roundtrip-start-date',
            'passengers' => 'required'

        ];
    }

    public function messages(){
        return [
            'flight-type.required' => 'Seleziona il tipo di volo',
            'from.required' => 'Seleziona il paese di provenienza',
            'from-airport.required' => "Seleziona l'aereoporto di partenza",
            'to.required' => 'Seleziona il paese di destinazione',
            'to-airport.required' => "Seleziona l'aereoporto di destinazione",
            'oneway-date.required_without_all' => 'Inserisci la data di partenza',
            'rountrip-start-date.required_with' => 'Inserisci anche la data per il volo di ritorno',
            'rountrip-end-date.required_with' => 'Inserisci anche la data per il volo di partenza',
            'passengers.required' => 'Seleziona il numero di passeggeri'
        ];
    }
}
