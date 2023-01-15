<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use App\Models\FlightEvent;
use App\Traits\Common\FlightEventsControllerCommonTrait;
use Exception;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use Illuminate\Support\Facades\Log;

class FlightEventsController extends Controller
{
    use FlightEventsControllerCommonTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $response_data = $this->setIndexResponseData();
            return response()->json($response_data[C::KEY_RESPONSE], $response_data[C::KEY_CODE],[], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false, C::KEY_EMPTY => false, C::KEY_MESSAGE => C::ERR_FLIGHT_EVENTS
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlightEvent  $flightEvent
     * @return \Illuminate\Http\Response
     */
    public function show(FlightEvent $flightEvent,$id)
    {
        $params = [
            'messages' => [ 'error' => C::ERR_URLNOTFOUND_NOTALLOWED ]
        ];
        try{
            $response_data = $this->setShowResponseData($id,$params);
            if($response_data[C::KEY_CODE] == 200)
                return response()->view(P::VIEW_FLIGHTEVENT,$response_data[C::KEY_RESPONSE]);
            session()->put('redirect','1');
            return redirect(P::URL_ERRORS);
        }catch(Exception $e){
            Log::channel('stdout')->error("FlightEventsController show Exception => ".$e->getMessage());
            return response()->view(P::VIEW_FLIGHTEVENT,[
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_FLIGHT_EVENT_SINGLE
            ],500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FlightEvent  $flightEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightEvent $flightEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlightEvent  $flightEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlightEvent $flightEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlightEvent  $flightEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightEvent $flightEvent)
    {
        //
    }
}
