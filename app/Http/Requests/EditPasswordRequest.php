<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Auth::check();
    }

    public function messages()
    {
        //Validation error messages
        return [
            'oldpwd.required' => 'Il campo è obbligatorio',
            'oldpwd.password' => 'Password errata',
            'newpwd.required' => 'Il campo è obbligatorio',
            'newpwd.min' => 'Deve contenere almeno 8 caratteri',
            'confnewpwd.required' => 'Il campo è obbligatorio',
            'confnewpwd.min' => 'Deve contenere almeno 8 caratteri',
            'confnewpwd.same' => 'Deve essere uguale al campo nuova password',
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
            'oldpwd' => ['required','password'],
            'newpwd' => ['required','min:8'],
            'confnewpwd' => ['required','min:8','same:newpwd']
        ];
    }
}
