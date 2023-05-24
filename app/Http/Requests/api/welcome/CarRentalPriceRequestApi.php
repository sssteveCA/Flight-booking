<?php

namespace App\Http\Requests\api\welcome;

use App\Traits\Common\CarRentalPriceRequestCommonTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Constants as C;

class CarRentalPriceRequestApi extends FormRequest
{

    use CarRentalPriceRequestCommonTrait;

    protected $stopOnFirstFailure = false;

    protected function failedValidation(Validator $validator){
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => $errors[array_key_first($errors)][0] 
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }
    
}
