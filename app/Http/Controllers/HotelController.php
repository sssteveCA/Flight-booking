<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;
use App\Traits\Common\HotelControllerCommonTrait;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Constants as C;
use Illuminate\Http\Exceptions\HttpResponseException;

class HotelController extends Controller
{

    use HotelControllerCommonTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $user_id = auth()->id();
            $response_data = $this->setIndexResponseData($user_id);
            return response()->view(P::VIEW_MYHOTELS,$response_data[C::KEY_RESPONSE]);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->view(P::VIEW_MYHOTELS,[
                    C::KEY_DONE => false,
                    C::KEY_MESSAGE => C::ERR_MYHOTELS
                ],500)
            );
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
        $inputs = $request->all();
        $user_id = auth()->id();
        try{
            $hotel = $this->create_hotel($inputs["session_id"],$user_id);
            $response_array = $this->setStoreResponseData($hotel);
            return response()->view(P::VIEW_BOOKHOTEL,$response_array,201);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->view(P::VIEW_BOOKHOTEL,[
                    C::KEY_DONE => false,
                    C::KEY_MESSAGE => C::ERR_REQUEST,
                    C::KEY_STATUS => 'ERROR'
                ],400)
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel,$myHotel)
    {
        try{
            $user_id = auth()->id();
            $params = [ 'messages' => [ 'error' => C::ERR_URLNOTFOUND_NOTALLOWED ] ];
            $response_data = $this->setShowResponseData($myHotel,$user_id,$params);
            if($response_data[C::KEY_CODE] == 200){
                return response()->view(P::VIEW_HOTEL, $response_data["response"]);
            }
            session()->put('redirect','1');
            return redirect(P::URL_ERRORS);
        }catch(Exception $e){
            session()->put('redirect','1');
            return redirect(P::URL_ERRORS);
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel, $myHotel)
    {
        try{
            $user_id = auth()->id();
            $response_data = $this->setDestroyResponseData($myHotel,$user_id);
            if(in_array($response_data[C::KEY_CODE],[200,401,404]))
                return response()->json($response_data[C::KEY_RESPONSE],$response_data[C::KEY_CODE],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE); 
            throw new Exception;  
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->json([
                    C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_HOTEL_DELETE
                ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
            );
        }
    }
}
