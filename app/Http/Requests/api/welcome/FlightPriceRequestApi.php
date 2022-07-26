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

class FlightPriceRequestApi extends FormRequest
{
    use FlightPriceRequestCommonTrait;

    protected $stopOnFirstFailure = true;

    protected function failedValidation(Validator $validator)
    {
        Log::channel('stdout')->error('FlightPriceRequestApi failed validation');
        $errors = (new ValidationException($validator))->errors();
        Log::channel('stdout')->error(var_export($errors,true));
        throw new HttpResponseException(
            response()->json($errors,400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }
}
