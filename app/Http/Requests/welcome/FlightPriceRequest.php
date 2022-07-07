<?php

namespace App\Http\Requests\welcome;

use App\Interfaces\Paths as P;
use Illuminate\Foundation\Http\FormRequest;

class FlightPriceRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;
    protected $redirect = P::URL_ROOT;
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
