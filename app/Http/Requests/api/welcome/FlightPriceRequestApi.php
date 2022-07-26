<?php

namespace App\Http\Requests\api\welcome;

use Illuminate\Foundation\Http\FormRequest;
use App\Interfaces\Paths as P;
use App\Http\Requests\welcome\FlightPriceRequest;

class FlightPriceRequestApi extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
