<?php

namespace App\Traits\Common;

use App\Models\FlighEvent;
use Illuminate\Http\Request;

trait FlightsEventControllerCommonTrait{

    //
    public function getAll(Request $request = null){
        $fe_list = FlighEvent::all();
        $responseData = ['done' => false, 'empty' => false, 'list' => $fe_list];
        if($fe_list->count() > 0)
            $responseData['done'] = true;     
        else{
            $responseData['done'] = true;
            $responseData['empty'] = true;
        }
        return response()->json($responseData, 200,[], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
?>