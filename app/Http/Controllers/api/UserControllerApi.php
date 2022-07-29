<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\Common\UserControllerCommonTrait;
use Illuminate\Http\Request;
use App\Classes\UserManager;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;

class UserControllerApi extends Controller
{
    use UserControllerCommonTrait;

    public function __construct()
    {
        $this->auth_id = auth('api')->user()->id;
        //Log::channel('stdout')->info("UserController  auth_id => ".var_export($this->auth_id,true));
        $this->usermanager =  new UserManager();   
    }

    //get user info
    public function getData(){
        $userAuth = $this->usermanager->getUser($this->auth_id);
        //Log::channel('stdout')->info("userAuth => ".var_export($userAuth,true));
        if($userAuth != null){
            return response()->json(
                ['user' => $userAuth
            ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        return response()->json(
            [
            C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
        ],401,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
