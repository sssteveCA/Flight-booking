<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUsernameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    public function messages()
    {
        //Validation error messages
        return[
            'username.required' => 'Lo username è obbligatorio',
            'username.min' => 'Lo username deve avere almeno 5 caratteri',
            'username.max' => 'Lo username non può avere più di 20 caratteri'
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
            'username' => ['required', 'min:5', 'max:25']
        ];
    }
}
