<?php

namespace App\Traits\Common;

use App\Interfaces\Constants as C;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/**
 * This trait contains common code between EditUsernameRequest & EditUsernameRequestApi
 */
trait EditUsernameRequestCommonTrait{

    
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
        $ve = new ValidationException($validator);
        $messages = $ve->errors();
        $key_first = array_key_first($messages);
        throw new HttpResponseException(
            /* response()->view(P::VIEW_FALLBACK,
                ['messages' => $messages]
            ,400) */
            response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => $messages[$key_first][0]
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }

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