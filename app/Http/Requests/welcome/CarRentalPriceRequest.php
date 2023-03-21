<?php

namespace App\Http\Requests\welcome;

use App\Traits\Common\CarRentalPriceRequestCommonTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;

class CarRentalPriceRequest extends FormRequest
{
    use CarRentalPriceRequestCommonTrait;

    protected $stopOnFirstFailure = true;

    protected function failedValidation(Validator $validator ){
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->view(P::VIEW_CARRENTALPRICERESULT,[
               C::KEY_DONE => false, 'errors' => $errors
            ], 400)
        );
        
    }

    
}
