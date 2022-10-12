<?php

namespace App\Traits\Common;

/**
 * This trait contains common code for EditPasswordRequest & EditPasswordRequestApi
 */
trait EditPasswordRequestCommonTrait{
    
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
?>