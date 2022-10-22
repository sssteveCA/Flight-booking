<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class LogoutControllerApi extends Controller
{
    /**
     * Revoke user tokens and logout
     */
    public function logout(Request $request){
        Auth::user()->tokens->each(function($token, $key){
            $token->delete();
        });
        return response()->json([
            'done' => true,
            'msg' => 'Non sei più autenticato'
        ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
