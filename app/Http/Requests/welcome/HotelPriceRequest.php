<?php

namespace App\Http\Requests\welcome;

use App\Traits\Common\HotelPriceRequestCommonTrait;
use Illuminate\Foundation\Http\FormRequest;

class HotelPriceRequest extends FormRequest
{

    use HotelPriceRequestCommonTrait;

}
