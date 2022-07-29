<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUsernameRequest;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Classes\UserManager;
use App\Traits\Common\UserControllerCommonTrait;

class UserController extends Controller
{
    use UserControllerCommonTrait;

    public function __construct()
    {
        $this->auth_id = Auth::id();
        //Log::channel('stdout')->info("UserController  auth_id => ".var_export($this->auth_id,true));
        $this->usermanager =  new UserManager();   
    }

    //get user info
    public function getData(){
        $userAuth = $this->usermanager->getUser($this->auth_id);
        //Log::channel('stdout')->info("userAuth => ".var_export($userAuth,true));
        if($userAuth != null){
            return response()->view(P::VIEW_PROFILE_INFO,['user' => $userAuth],200);
        }
        else
            return response()->view(P::VIEW_FALLBACK,[
                C::KEY_MESSAGES => [C::ERR_URLNOTFOUND_NOTALLOWED]
            ],404);
    }
}