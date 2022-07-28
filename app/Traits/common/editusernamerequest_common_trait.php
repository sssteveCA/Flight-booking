<?php

namespace App\Traits\Common;

//This trait contains common code between EditUsernameRequest & EditUsernameRequestApi
trait EditUsernameRequestCommonTrait{

    public function attributes()
    {
        return [
            'username' => 'nome utente'
        ];
    }

    public function messages()
    {
        //Validation error messages
        return[
            'username.required' => 'Il campo :attribute è obbligatorio',
            'username.min' => 'Il campo :attribute deve avere almeno :min caratteri',
            'username.max' => 'Il campo :attribute non può avere più di :max caratteri'
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
?>