<?php

namespace App\Http\Requests\welcome;

use App\Interfaces\Paths as P;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
            'oneway-date' => 'required_without_all:roundtrip-start-date,roundtrip-end-date',
            'roundtrip-start-date' => 'required_with:roundtrip-end-date',
            'roundtrip-end-date' => 'required_with:roundtrip-start-date',
            'adults' => 'required|integer|min:1',
            'teenagers' => 'required|integer|min:0',
            'children' => 'required|integer|min:0',
            'newborns' => 'required|integer|min:0',
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
            'adults.required' => 'Inserisci il numero di passeggeri adulti',
            'adults.integer' => 'Inserisci il numero di passeggeri adulti',
            'teenagers.required' => 'Inserisci il numero di passeggeri adolescenti',
            'teenagers.integer' => 'Inserisci il numero di passeggeri adolescenti',
            'children.required' => 'Inserisci il numero di passeggeri bambini',
            'children.integer' => 'Inserisci il numero di passeggeri bambini',
            'newborns.required' => 'Inserisci il numero di passeggeri neonati',
            'newborns.integer' => 'Inserisci il numero di passeggeri neonati',
        ];
    }

    public function attributes()
    {
        return [
            'flight-type' => 'Tipo di volo',
            'from' => 'Paese di partenza',
            'from-airport' => 'Aereoporto di partenza',
            'to' => 'Paese di destinazione',
            'to-airport' => 'Aereoporto di destinazione',
            'oneway-date' => 'Data del volo di partenza',
            'roundtrip-start-date' => 'Data del volo di partenza',
            'roundtrip-end-date' => 'Data del volo di ritorno',
            'adults' => 'Numero di adulti',
            'teenagers' => 'Numero di adolescenti',
            'children' => 'Numero di bambini',
            'newborns' => 'Numero di neonati',
        ];
    }

    protected function failedValidation(ValidationValidator $validator)
    {
        Log::channel('stdout')->error('ValidationException');
        $errors = (new ValidationException($validator))->errors();
        Log::channel('stdout')->error(var_export($errors,true));
        throw new HttpResponseException(
            response()->view('welcome/flightpriceresult',['errors' => $errors],400)
            /* response()->json(['errors' => $errors],422,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_SLASHES) */
        );
    }


}
