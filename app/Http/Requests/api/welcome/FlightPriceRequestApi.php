<?php

namespace App\Http\Requests\api\welcome;

use Illuminate\Foundation\Http\FormRequest;
use App\Interfaces\Paths as P;
use App\Http\Requests\welcome\FlightPriceRequest;
use App\Traits\Common\FlightPriceRequestCommonTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Constants as C;

class FlightPriceRequestApi extends FormRequest
{
    use FlightPriceRequestCommonTrait;

    protected $stopOnFirstFailure = true;

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json([
                C::KEY_DONE => false, C::KEY_STATUS => 'ERROR', 'errors' => $errors
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }
}
