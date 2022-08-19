<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Exceptions\OAuthServerException;
use App\Interfaces\Constants as C;

class LoginControllerApi extends Controller
{

    //return current logged user
    public function getCurrentUser(){
        //Log::channel('stdout')->info("ApiLoginController getCurrentUser");
        return response()->json(['user' => Auth::user()]);
    }
        
    //
    public function login(Request $request){
        //Log::channel('stdout')->info("ApiLoginController login");
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        //Invalid Credentials
        if(!Auth::attempt($login)){
            return response()->json([
                C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => C::ERR_INVALIDCREDENTIALS,
                'logged' => false
            ],401,array(),JSON_UNESCAPED_UNICODE);
        }

        //Valid credentials
        $token = Auth::user()->createToken('token')->accessToken;
        return response()->json([
            C::KEY_STATUS => 'OK',
            'logged' => true,
            'token' => $token,
            'user' => Auth::user()
        ],200,array(),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }
}
