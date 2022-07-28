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

    public function attributes()
    {
        return [
            'oldpwd' => 'vecchia password',
            'newpwd' => 'nuova password',
            'confnewpwd' => 'conferma nuova password'
        ];
    }

    public function messages()
    {
        //Validation error messages
        return [
            'required' => 'Il campo :attribute è obbligatorio',
            'min' => 'Il campo :attribute deve avere almeno :min caratteri',
            'confnewpwd.same' => ':attribute deve essere uguale al campo nuova password',
            'oldpwd.password' => 'Password attuale errata',                 
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
