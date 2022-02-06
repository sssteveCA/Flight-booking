<?php

namespace App\Http\Requests\api;

use Constants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiEditUsernameRequest extends FormRequest
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

    public function messages(){
        //Validation error messages
        return[
            'username.required' => Constants::VERR_USERNAME1_REQUIRED,
            'username.min' => Constants::VERR_USERNAME1_MIN,
            'username.max' => Constants::VERR_USERNAME1_MAX
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
