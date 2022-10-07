<?php

namespace App\Http\Requests\api;

use App\Interfaces\Constants as C;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequestApi extends FormRequest
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

    public function messages()
    {
        return [
            'required' => ':attribute è obbligatorio',
            'email' => ':attribute deve essere un indirizzo email',
            'string' => ':Il valore di :attribute non è in un formato valido'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new HttpResponseException(
            response()->json([
                C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => $error,
                'logged' => false
            ],401,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }
}
