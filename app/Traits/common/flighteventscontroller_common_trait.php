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

    //
    public function getAll(Request $request = null){
        try{
            $fe_list = FlightEvent::all();
            $responseData = [C::KEY_DONE => false, C::KEY_EMPTY => false, 'list' => $fe_list, C::KEY_MESSAGE => ''];
            if($fe_list->count() > 0)
                $responseData[C::KEY_DONE] = true;     
            else{
                $responseData[C::KEY_DONE] = true;
                $responseData[C::KEY_EMPTY] = true;
                $responseData[C::KEY_MESSAGE] = 'Nessun evento da mostrare';
            }
            return response()->json($responseData, 200,[], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->json([
                    C::KEY_DONE => false, C::KEY_EMPTY => false, C::KEY_MESSAGE => C::ERR_FLIGHT_EVENTS
                ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
            );
        }
    }
}
?>