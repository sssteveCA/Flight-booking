<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\Common\CarRentalControllerCommonTrait;
use Exception;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarRentalControllerApi extends Controller
{

    use CarRentalControllerCommonTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $user_id = auth('api')->user()->id;
            $response_data = $this->setIndexResponseData($user_id);
            return response()->json($response_data[C::KEY_RESPONSE],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_MYCARS
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try{
            $inputs = $request->all();
            $user_id = auth('api')->user()->id;
            $car = $this->create_rented_car($inputs["session_id"],$user_id);
            $response_array = $this->setStoreResponseData($car);
            return response()->json($response_array,201,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_REQUEST
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user_id = auth('api')->user()->id;
            $params = [ 'messages' => [ 'error' => C::ERR_URLNOTFOUND_NOTALLOWED_API ] ];
            $response_data = $this->setShowResponseData($id,$user_id,$params);
            return response()->json($response_data[C::KEY_RESPONSE],$response_data[C::KEY_CODE],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(ModelNotFoundException $e){  
            return response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
            ],404,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_REQUEST
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
