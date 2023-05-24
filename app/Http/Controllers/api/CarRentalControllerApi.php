<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\Common\CarRentalControllerCommonTrait;
use Exception;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        try{
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
        //
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
