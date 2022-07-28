<?php

namespace App\Http\Requests;

use App\Interfaces\Paths as P;
use App\Traits\Common\EditPasswordRequestCommonTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class EditPasswordRequest extends FormRequest
{
    use EditPasswordRequestCommonTrait;

    protected $stopOnFirstFailure = true;

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
        Log::channel('stdout')->error('EditPasswordRequest ValidationException');
        $ve = new ValidationException($validator);
        $messages = $ve->errors();
        throw new HttpResponseException(
            response()->view(P::VIEW_FALLBACK,
                ['messages' => $messages]
            ,400)
        );
    }


}
