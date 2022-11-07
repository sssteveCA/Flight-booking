<?php

namespace App\Http\Requests\api\welcome;

use App\Traits\Common\HotelPriceRequestCommonTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Constants as C;

class HotelPriceRequestApi extends FormRequest
{

    use HotelPriceRequestCommonTrait;

    protected $stopOnFirstFailure = true;

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json([
               C::KEY_DONE => false, C::KEY_STATUS => 'ERROR', C::KEY_ERRORS => $errors
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }

}
