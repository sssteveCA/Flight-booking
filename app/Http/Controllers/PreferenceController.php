<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use Illuminate\Support\Facades\Log;

class PreferenceController extends Controller
{
    /**
     * Set the cookie with the expressed user preferences
     */
    public function cookieSet(Request $request){
        $option = $request->input('option');
        if($option && in_array($option,['accepted','rejected'])){
            $duration = $request->input('duration', 60*24);
            return response()->json(
                [C::KEY_DONE => true],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE
            )->cookie('preference', $option, $duration );
        }//if($option && in_array($option,['accepted','rejected'])){
        else{
            return response()->json(
                [ C::KEY_DONE => false, C::KEY_MESSAGE => 'Bad Request'],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }
}
