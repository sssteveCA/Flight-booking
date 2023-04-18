<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\LoginRequestApi;
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
        return response()->json(['user' => Auth::user()]);
    }
        
    //
    public function login(LoginRequestApi $request){
        $login = $request->validated();
        //Invalid Credentials
        if(!Auth::attempt($login)){
            return response()->json([
                C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => C::ERR_INVALIDCREDENTIALS,
                'logged' => false
            ],401,array(),JSON_UNESCAPED_UNICODE);
        }
        //Check if account is verified
        $user = Auth::user();
        if($user['email_verified_at'] == null){
            return response()->json([
                C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => C::ERR_VERIFYYOURACCOUNT,
                'logged' => false
            ],401,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        //Valid credentials
        $token = $user->createToken('token')->accessToken;
        return response()->json([
            C::KEY_STATUS => 'OK',
            'logged' => true,
            'token' => $token,
            'user' => $user
        ],200,array(),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }
}
