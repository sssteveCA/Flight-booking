<?php
namespace App\Classes;

use App\Http\Requests\api\ApiEditPasswordRequest;
use App\Http\Requests\api\ApiEditUsernameRequest;
use App\Models\User;
use Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ApiUserManager{

    private $auth_id; //Logged user Id 

    public function __construct()
    {
        $this->auth_id = Auth::id();
        Log::channel('stdout')->info("ApiUserManager Auth id ".$this->auth_id);
    }

    public function editUsername(ApiEditUsernameRequest $request){
        $message = array();
        $message['edited'] = false;
        $userA = $this->getUser();
        if($userA != null){
            //User logged found
            $username = $request->username;
            $userA->name = $username;
            //update 'name' field of logged user
            $save = $userA->save();
            Log::channel('stdout')->info("editUsername save");
            $message['edited'] = true;
            $message['msg'] = Constants::OK_USERNAMEUPDATED;
        }//if($userA != null){
        else
        $message['msg'] = Constants::ERR_NOTABLEGETUSERINFO;
        return $message;  
    }

    public function editPassword(ApiEditPasswordRequest $request){
        Log::channel('stdout')->debug('ApiUserManager editPassword');
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
            $message['msg'] = Constants::ERR_NOTABLEGETUSERINFO;
        }
        return $message;
    }

    //Get Authenticated user info
    public function getUser(){
        $user = null;
        if(isset($this->auth_id)){
            $user = User::find($this->auth_id);
        }
        return $user;
    }
}
?>