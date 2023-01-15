<?php

namespace App\Traits\Common;

use Exception;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Models\FlightEvent;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Ths trait is used to put common code for FlightsEventController & FlightsEventControllerApi classes
 */
trait FlightEventsControllerCommonTrait{

    /**
     * Set the response data for the FlightEventsController index route
     */
    private function setIndexResponseData(): array{
        $fe_list = FlightEvent::orderByDesc('date')->get();
        if($fe_list->count() > 0)
            return [
                C::KEY_CODE => 200,
                C::KEY_RESPONSE => [
                    C::KEY_DONE => true, C::KEY_EMPTY => false, 'list' => $fe_list, C::KEY_MESSAGE => ''
                ]
            ];
        return [
            C::KEY_CODE => 200,
            C::KEY_RESPONSE => [
                C::KEY_DONE => true, C::KEY_EMPTY => true, 'list' => $fe_list, C::KEY_MESSAGE => 'Nessun evento da mostrare'
            ]
        ];
    }


}
?>