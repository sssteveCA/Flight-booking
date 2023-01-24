<?php

namespace App\Http\Controllers;

use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Classes\UserManager;
use App\Http\Requests\UserDeleteRequest;
use App\Models\Flight;
use App\Traits\Common\UserControllerCommonTrait;
use Exception;

class UserController extends Controller
{
    use UserControllerCommonTrait;

    public function __construct()
    {
        $this->auth_id = Auth::id();
        //Log::channel('stdout')->info("UserController  auth_id => ".var_export($this->auth_id,true));
        $this->usermanager =  new UserManager();   
    }

    /**
     * Get user info
     */
    public function getData(){
        try{
            $userAuth = $this->usermanager->getUser($this->auth_id);
            //Log::channel('stdout')->info("userAuth => ".var_export($userAuth,true));
            if($userAuth != null){
                return response()->view(P::VIEW_PROFILE_INFO,[
                    C::KEY_DONE => true, 'user' => $userAuth],200);
            }
            session()->put('redirect','1');
            return redirect(P::URL_ERRORS);
        }catch(Exception $e){
            return response()->view(P::VIEW_PROFILE_INFO,[
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_PROFILE_INFO
            ],500);
        }
        
    }

    /**
     * User account hard delete
     */
    public function deleteAccountHard(UserDeleteRequest $request){
        try{
            $inputs = $request->validated();
            /* Log::channel('stdout')->info("UserController deleteAccountHard input => ");
            Log::channel('stdout')->info(var_export($inputs,true)); */
            $user = $this->usermanager->getUser($this->auth_id);
            if($user != null){
                //Logout before remove user record
                auth()->logout();
                //Delete all flights associated to this user
                Flight::where('user_id',$this->auth_id)->delete();
                //Delete user record in MySQL
                $user->delete();
                return response()->json([
                    C::KEY_DONE => true, C::KEY_STATUS => 'OK', C::KEY_MESSAGE => C::OK_ACCOUNTDELETED
                ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }//if($user != null){
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