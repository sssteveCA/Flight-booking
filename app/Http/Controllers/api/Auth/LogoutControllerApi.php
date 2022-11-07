<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use App\Interfaces\Constants as C;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

class LogoutControllerApi extends Controller
{
    /**
     * Revoke user tokens and logout
     */
    public function logout(Request $request){
        try{
            Log::channel('stdout')->debug("LogoutControllerApi logout");
            Auth::user()->tokens->each(function($token, $key){
                $token->delete();
            });
            return response()->json([
                C::KEY_DONE => true,
                C::KEY_STATUS => 'OK',
                C::KEY_MESSAGE => 'Non sei più autenticato'
            ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->json([
                    C::KEY_DONE => false,
                    C::KEY_STATUS => 'ERROR',
                    C::KEY_MESSAGE => ''
                ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
            );
        }
        
    }
}
