<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    //Overriding method
    protected function sendFailedLoginResponse(Request $request)
    {
        $response = array();
        if(!User::where('email',$request->email)->first()){
            //No account found with email entered
            $response['errors'] = Constants::ERR_EMAILNOTFOUND;
        }//if(!User::where('email',$request->email)->first()){
        else if(!User::where('email',$request->email)->where('password',Hash::make($request->password))->first()){
            //Incorrect password
            $response['errors'] = Constants::ERR_PASSWORDINCORRECTLOGIN;
        }//if(!User::where('email',$request->email)->where('password',Hash::make($request->password))->first()){
        else{
            //Other errors
            $response['errors'] = Constants::ERR_INVALIDCREDENTIALS;
        }
            
        return $response;
    }
}
