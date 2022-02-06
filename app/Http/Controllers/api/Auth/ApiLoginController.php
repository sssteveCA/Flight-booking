<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiLoginController extends Controller
{
    //
    public function login(Request $request){
        Log::channel('stdout')->info("ApiLoginController login");
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        //Invalid Credentials
        if(!Auth::attempt($login)){
            return response()->json([
                'status' => '401',
                'message' => Constants::ERR_INVALIDCREDENTIALS,
                'logged' => false
            ]);
        }

        //Credenziali valide
        $token = Auth::user()->createToken('token')->accessToken;
        return response()->json([
            'status' => '200',
            'logged' => true,
            'token' => $token
        ]);
    }
}
