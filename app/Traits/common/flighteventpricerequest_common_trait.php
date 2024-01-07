<?php

namespace App\Traits\Common;

/**
 * Trait used By FlightEventPriceRequest & FlightEventPriceRequestApi
 */
trait FlightEventPriceRequestCommonTrait{

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tickets' => ['numeric', 'min:1' ]
        ];
    }

    public function messages(){
        return [
            'required' => "L'attributo :attribute è obbligatorio",
            'min' => "L'attributo :attribute deve avere un valore maggiore o uguale a :min"
        ];
    }

    public function attributes(){
        return [
            'tickets' => "Biglietti"
        ];
    }

}
?>