<?php

namespace App\Http\Requests\welcome;

use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Rules\DateDiff1d;
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
            'company_name' => 'required',
            'from' => 'required',
            'from-airport' => 'required',
            'to' => 'required',
            'to-airport' => 'required',
            'oneway-date' => ['required_without_all:roundtrip-start-date,roundtrip-end-date', new DateDiff1d('oneway-date')],
            'roundtrip-start-date' => ['required_with:roundtrip-end-date', new DateDiff1d('roundtrip-start-date')],
            'roundtrip-end-date' => ['required_with:roundtrip-start-date', new DateDiff1d('roundtrip-end-date')],
            'adults' => 'required|integer|min:1',
            'teenagers' => 'required|integer|min:0',
            'children' => 'required|integer|min:0',
            'newborns' => 'required|integer|min:0',
        ];
        
    }

    public function messages(){
        return [
            'integer' => "L'attributo :attribute deve contenere un numero intero valido",
            'required' => "L'attributo :attribute è obbligatorio",
            'oneway-date.required_without_all' => 'Inserisci la data di partenza',
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
            'flight-type' => 'tipo di volo',
            'company_name' => 'compagnia aerea',
            'from' => 'paese di partenza',
            'from-airport' => 'aereoporto di partenza',
            'to' => 'paese di destinazione',
            'to-airport' => 'aereoporto di destinazione',
            'oneway-date' => 'data del volo di partenza',
            'roundtrip-start-date' => 'data del volo di partenza',
            'roundtrip-end-date' => 'data del volo di ritorno',
            'adults' => 'numero di adulti',
            'teenagers' => 'numero di adolescenti',
            'children' => 'numero di bambini',
            'newborns' => 'numero di neonati',
        ];
    }

    protected function failedValidation(ValidationValidator $validator)
    {
        Log::channel('stdout')->error('ValidationException');
        $errors = (new ValidationException($validator))->errors();
        Log::channel('stdout')->error(var_export($errors,true));
        throw new HttpResponseException(
            response()->view(P::VIEW_FLIGHTPRICERESULT,['errors' => $errors],400)
            /* response()->json(['errors' => $errors],422,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_SLASHES) */
        );
    }




}
