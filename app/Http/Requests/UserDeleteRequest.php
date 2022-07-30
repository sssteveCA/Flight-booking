<?php

namespace App\Http\Requests;

use App\Interfaces\Constants as C;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UserDeleteRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /* public function authorize()
    {
        return Auth::check();
    } */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => ['password'],
            'password_conf' => ['same:password']
        ];
    }

    public function attributes(){
        return [
            'password' => 'password',
            'password_conf' => 'password di conferma'
        ];
    }

    public function messages(){
        return [
            'password' => 'La password inserita è errata',
            'same' => "La :attribute è diversa dalla password inserita"
        ];
    }

    /* protected function failedAuthorization()
    {
        return response()->json([
            'status' => 'ERROR',
            'message' => C::ERR_UNAUTHORIZED_REQUEST
        ],401,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    } */

    protected function failedValidation(Validator $validator)
    {
        $message = $validator->errors()->first();
        throw new HttpResponseException(
            /* response()->view(P::VIEW_FALLBACK,
                ['messages' => $messages]
            ,400) */
            response()->json([
                C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => $message
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }

}
