<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

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
            'required' => ':attribute è obbligatiorio',
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
}
