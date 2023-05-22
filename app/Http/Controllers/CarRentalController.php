<?php

namespace App\Http\Controllers;

use App\Traits\Common\CarRentalControllerCommonTrait;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;
use App\Interfaces\Constants as C;
use Exception;

class CarRentalController extends Controller
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
        $user_id = auth()->id();
        try{
            $carrental = $this->create_rented_car($request->session_id,$user_id);
            $response_array = $this->setStoreResponseData($carrental);
            return response()->view(P::VIEW_BOOKCARRENTAL,$response_array,201);
        }catch(Exception $e){    
            return response()->view(P::VIEW_BOOKCARRENTAL,[
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_REQUEST
            ],500);
        }
        //return redirect(P::URL_HOME);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
