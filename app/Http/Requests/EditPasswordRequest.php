<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EditPasswordRequest extends FormRequest
{

    public $validator = null;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
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
