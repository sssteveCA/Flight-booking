<?php

namespace App\Http\Requests\welcome;

use App\Traits\Common\CarRentalPriceRequestCommonTrait;
use Illuminate\Foundation\Http\FormRequest;

class CarRentalPriceRequest extends FormRequest
{
    use CarRentalPriceRequestCommonTrait;

    protected $stopOnFirstFailure = true;

    
}
