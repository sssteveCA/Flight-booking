<?php

namespace App\Http\Requests\welcome;

use App\Traits\Common\HotelPriceRequestCommonTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Paths as P;

class HotelPriceRequest extends FormRequest
{

    use HotelPriceRequestCommonTrait;

    protected $stopOnFirstFailure = true;

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->view(P::VIEW_HOTELPRICERESULT,[
               'done' => false, 'errors' => $errors
            ], 400)
        );
    }

}
