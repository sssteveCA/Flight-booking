<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Constants as C;

class EmailRequest extends FormRequest
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
            'name' => 'required',
            'email' => ['required','email'],
            'subject' => 'required',
            'message' => 'required'
        ];
    }

    public function messages(){
        return [
            'required' => "L'attributo :attribute è obbligatorio",
            'email' => "Inserisci un indirzzo email valido"
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome utente',
            'email' => 'indirizzo email',
            'subject' => 'oggetto',
            'message' => 'messaggio'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        //Log::channel('stdout')->error('EmailRequest ValidationException');
        $error = $validator->errors()->first();
        //Log::channel('stdout')->error(var_export($error,true));
        throw new HttpResponseException(
            response()->json([
                C::KEY_DONE => false,
                C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => $error
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }
}
