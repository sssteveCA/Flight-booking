<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\Common\UserControllerCommonTrait;
use Illuminate\Http\Request;
use App\Classes\UserManager;
use App\Http\Requests\UserDeleteRequest;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserControllerApi extends Controller
{
    use UserControllerCommonTrait;

    public function __construct()
    {
        $user_id = Auth::id();
        if(isset($user_id))
            $this->auth_id = $user_id;
        else $this->auth_id = null;
        Log::channel('stdout')->info("UserControllerApi  auth_id => ".var_export($this->auth_id,true));
        $this->usermanager =  new UserManager();   
    }

    //get user info
    public function getData(){
        Log::channel('stdout')->debug('UserControllerApi getData');
        if(isset($this->auth_id)){
            $userAuth = $this->usermanager->getUser($this->auth_id);
            //Log::channel('stdout')->info("userAuth => ".var_export($userAuth,true));
            if($userAuth != null){
                return response()->json(
                    ['user' => $userAuth
                ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }
        }
        return response()->json(
            [
            C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
        ],401,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    //user account hard delete
    public function deleteAccountHard(UserDeleteRequest $request){
        $inputs = $request->validated();
        Log::channel('stdout')->debug("UserControllerApi deleteAccountHard input=>");
        Log::channel('stdout')->debug(var_export($inputs,true));
        $user = $this->usermanager->getUser($this->auth_id);
        if($user != null){
            $userTokens = $user->tokens;
            Log::channel('stdout')->debug("UserControllerApi deleteAccountHard tokens =>");
            Log::channel('stdout')->debug(var_export($userTokens,true));
            foreach($userTokens as $token){
                $token->revoke();
            }
            Flight::where('user_id',$this->auth_id)->delete();
            $user->delete();
            return response()->json([
                C::KEY_STATUS => 'OK',
                C::KEY_MESSAGE => C::OK_ACCOUNTDELETED
            ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }//if($user != null){
        return response()->json([
            C::KEY_STATUS => 'ERROR',
            C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
        ],404,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
