<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\Common\UserControllerCommonTrait;
use Illuminate\Http\Request;
use App\Classes\UserManager;
use App\Http\Requests\UserDeleteRequest;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserControllerApi extends Controller
{
    use UserControllerCommonTrait;

    public function __construct()
    {
        $user = auth('api')->user();
        if(isset($user))
            $this->auth_id = auth('api')->user()->getAuthIdentifier();
        else $this->auth_id = null;
        Log::channel('stdout')->info("UserController  auth_id => ".var_export($this->auth_id,true));
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
        $user_id = auth('api')->id;
        Log::channel('stdout')->debug("UserControllerApi deleteAccountHard user id =>");
        Log::channel('stdout')->debug(var_export($user_id,true));
        $user = $this->usermanager->getUser($user_id);
        if($user != null){
            $user->revoke();
            $user->delete();
            return response()->json([
                C::KEY_STATUS => 'OK',
                C::KEY_MESSAGE => C::OK_ACCOUNTDELETED
            ],204,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }//if($user != null){
        return response()->json([
            C::KEY_STATUS => 'ERROR',
            C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
        ],404,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
