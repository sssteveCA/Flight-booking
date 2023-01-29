<?php

namespace App\Http\Controllers\api;

use App\Classes\UserManagerApi;
use App\Http\Controllers\Controller;
use App\Traits\Common\UserControllerCommonTrait;
use Illuminate\Http\Request;
use App\Classes\UserManager;
use App\Http\Requests\UserDeleteRequest;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Flight;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserControllerApi extends Controller
{
    use UserControllerCommonTrait;

    private UserManagerApi $usermanager_api;

    public function __construct()
    {
        $user_id = Auth::id();
        if(isset($user_id))
            $this->auth_id = $user_id;
        else $this->auth_id = null;
        //Log::channel('stdout')->info("UserControllerApi  auth_id => ".var_export($this->auth_id,true));
        $this->usermanager_api =  new UserManagerApi();   
    }

    /**
     * Get user info
     */
    public function getData(){
        try{
            $userAuth = $this->getDataCommon();
            //Log::channel('stdout')->info("userAuth => ".var_export($userAuth,true));
            if($userAuth != null)
                return response()->json(
                    [C::KEY_DONE => true,'user' => $userAuth],
                    200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            return response()->json([
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
            ],401,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_PROFILE_INFO
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        //Log::channel('stdout')->debug('UserControllerApi getData');
    }

    /**
     * User account hard delete
     */
    public function deleteAccountHard(UserDeleteRequest $request){
        try{
            $inputs = $request->validated();
            $delete = $this->deleteAccountApi();
            if($delete)
                return response()->json([
                    C::KEY_DONE => true, C::KEY_STATUS => 'OK', C::KEY_MESSAGE => C::OK_ACCOUNTDELETED
                ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            return response()->json([
                C::KEY_DONE => false, C::KEY_STATUS => 'ERROR', C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
            ],404,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_PROFILE_DELETE
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        
    }
}
