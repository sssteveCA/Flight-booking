<?php

namespace App\Http\Requests\welcome;

use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Rules\DateDiff1d;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Traits\Common\FlightPriceRequestCommonTrait;

class FlightPriceRequest extends FormRequest
{

    use FlightPriceRequestCommonTrait;

    protected $stopOnFirstFailure = true;
    protected $redirect = P::URL_ROOT;
    

    protected function failedValidation(ValidationValidator $validator)
    {
        //Log::channel('stdout')->error('ValidationException');
        $errors = (new ValidationException($validator))->errors();
        //Log::channel('stdout')->error(var_export($errors,true));
        throw new HttpResponseException(
            response()->view(P::VIEW_FLIGHTPRICERESULT,['errors' => $errors],400)
            /* response()->json(['errors' => $errors],422,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_SLASHES) */
        );
    }




}
