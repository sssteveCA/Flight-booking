<?php

namespace App\Http\Controllers\api\welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Common\FlightEventBookSearchControllerCommonTrait;
use Exception;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;

class FlightEventBookSearchControllerApi extends Controller
{
    use FlightEventBookSearchControllerCommonTrait;

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json([
               C::KEY_DONE => false, C::KEY_STATUS => 'ERROR', C::KEY_MESSAGE => $errors[array_key_first($errors)][0]
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
        );
    }

}
