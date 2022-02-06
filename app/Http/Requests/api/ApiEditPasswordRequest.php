<?php

namespace App\Http\Requests\api;

use Constants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiEditPasswordRequest extends FormRequest
{
    public $validator = null;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function messages()
    {
        //Validation error messages
        return [
            'oldpwd.required' => Constants::VERR_OLDPWD1_REQUIRED,
            'oldpwd.password' => Constants::VERR_OLDPWD1_PASSWORD,
            'newpwd.required' => Constants::VERR_NEWPWD1_REQUIRED,
            'newpwd.min' => Constants::VERR_NEWPWD1_MIN,
            'confnewpwd.required' => Constants::VERR_CONFNEWPWD1_REQUIRED,
            'confnewpwd.min' => Constants::VERR_CONFNEWPWD1_MIN,
            'confnewpwd.same' => Constants::VERR_CONFNEWPWD1_SAME,
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
