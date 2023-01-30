<?php

namespace App\Traits\Common;

use App\Interfaces\Constants as C;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/**
 * This trait contains common code for EditPasswordRequest & EditPasswordRequestApi
 */
trait EditPasswordRequestCommonTrait{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
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

    protected function failedValidation(Validator $validator)
    {
        //Log::channel('stdout')->error('EditPasswordRequest ValidationException');
        $ve = new ValidationException($validator);
        $messages = $ve->errors();
        $key_first = array_key_first($messages);
        throw new HttpResponseException(
            /* response()->view(P::VIEW_FALLBACK,
                ['messages' => $messages]
            ,400) */
            response()->json([
                C::KEY_MESSAGE => $messages[$key_first][0]
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }
}
?>