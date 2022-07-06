<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlightSearchController extends Controller
{
    //
    public function getSuggestions(Request $request){
        $inputs = $request->all();
        return response()->json(
            $inputs,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE
        );
    }
}
