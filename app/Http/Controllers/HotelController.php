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
            $hotels_collection = Hotel::where('user_id',$user_id)->get();
            //Log::channel('stdout')->info("HotelController index hotel_collections => ".var_export($hotels_collection,true));
            $hotels_number = $hotels_collection->count();
            if($hotels_number > 0){
                $hotels = $hotels_collection->toArray();
                Log::channel('stdout')->info("HotelController index hotel array => ".var_export($hotels,true));
                return response()->view(P::VIEW_MYHOTELS,[
                    C::KEY_DONE => true,
                    C::KEY_EMPTY => false,
                    'hotels' => $hotels,
                    'hotels_number' => $hotels_number]);
            }//if($hotels_number > 0){
            else{
                return response()->view(P::VIEW_MYHOTELS,[
                    C::KEY_DONE => true,
                    C::KEY_EMPTY => true,
                    C::KEY_MESSAGE => C::MESS_BOOKED_HOTEL_LIST_EMPTY,
                    'hotels_number' => $hotels_number
                ]);
            }
        }catch(Exception $e){
            Log::channel('stdout')->info("HotelController index exception => ".var_export($e->getMessage(),true));
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
        //Log::channel('stdout')->debug("HotelController store inputs => ".var_export($inputs,true));
        try{
            $hotel = $this->create_hotel($inputs["session_id"]);
            $response_array = $this->setResponseData($hotel);
            return response()->view(P::VIEW_BOOKHOTEL,$response_array,201);
        }catch(Exception $e){
            //Log::channel('stdout')->debug("HotelController store exception => ".$e->getMessage());
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
    public function show(Hotel $hotel)
    {
        $hotel = Hotel::find($hotel);
        if($hotel != null){
            $user_id = auth()->id();
            if($user_id == $hotel->user_id){
                return response()->view(P::VIEW_HOTEL,[
                    'hotel' => $hotel
                ]);
            }//if($user_id == $hotel->user_id){
        }//if($hotel != null){
        return redirect(P::URL_ERRORS);
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
    public function destroy(Hotel $hotel)
    {
        //
    }
}
