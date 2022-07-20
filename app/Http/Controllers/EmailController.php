<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Send email to website admin
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request){
        $request_array = $request->all();
        $response = [
            'done' => false,
            'msg' => 'Messaggio di risposta',
            'request' => $request_array
        ];
        return response()->json($response,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
