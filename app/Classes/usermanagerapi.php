<?php
namespace App\Classes;

use App\Http\Requests\api\ApiEditPasswordRequest;
use App\Http\Requests\api\ApiEditUsernameRequest;
use App\Http\Requests\api\EditPasswordRequestApi;
use App\Http\Requests\api\EditUsernameRequestApi;
use App\Models\User;
use App\Traits\Common\UserManagerCommonTrait;
use Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserManagerApi{

    use UserManagerCommonTrait;

    private $auth_id; //Logged user Id 

    public function __construct()
    {
        $this->auth_id = Auth::id();
        if(!isset($this->auth_id)){
            $apiUser = auth('api')->user();
            if(isset($apiUser->id)){
                $this->auth_id = $apiUser->id;
                //Log::channel('stdout')->info("UserManagerApi Auth id ".$this->auth_id);
                //Log::channel('stdout')->info("UserManagerApi auth(api) id  ".var_export(auth('api')->user()->id,true));
            }
        } 
        //Log::channel('stdout')->info("UserManagerApi Auth::id ".var_export(Auth::id(),true));
    }

    public function getAuthId(){return $this->auth_id;}

    public function editUsername(EditUsernameRequestApi $request){
        //Log::channel('stdout')->info("UserManagerApi editUsername ");
        $message = array();
        $message['edited'] = false;
        $userA = $this->getUser();
        if($userA != null){
            //User logged found
            $username = $request->username;
            $userA->name = $username;
            //update 'name' field of logged user
            $save = $userA->save();
            //Log::channel('stdout')->info("editUsername save");
            $message['edited'] = true;
            $message['msg'] = Constants::OK_USERNAMEUPDATED;
        }//if($userA != null){
        else
        $message['error'] = Constants::ERR_NOTABLEGETUSERINFO;
        return $message;  
    }

    public function editPassword(EditPasswordRequestApi $request){
        //Log::channel('stdout')->debug('UserManagerApi editPassword');
        $message = array();
        $message['edited'] = false;
        $userA = $this->getUser();
        if($userA != null){
            //User logged found
            $oldpwd = $request->oldpwd;
            $newpwd = $request->newpwd;
            //Create an hash for new password and save it
            $userA->password = Hash::make($newpwd);
            $userA->save();
            $message['edited'] = true;
            $message['msg'] = Constants::OK_PASSWORDUPDATED;
        }//if($userA != null){
        else{
            $message['error'] = Constants::ERR_NOTABLEGETUSERINFO;
        }
        return $message;
    }
}
?>