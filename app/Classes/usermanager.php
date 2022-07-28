<?php

use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUsernameRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Constants as C;

class UserManager{

    private $auth_id;

    public function __construct()
    {
        /*$this->auth_id = Auth::id();
        Log::channel('stdout')->info("Functions Auth id ".$this->auth_id);*/
    }

    public function editUsername(EditUsernameRequest $request,$auth_id){
        $message = array();
        $message['edited'] = false;
        $message['title'] = C::TITLE_EDITUSERNAME;
        $userA = $this->getUser($auth_id);
        //If username input field exists and it's not empty
        if($userA != null){
            $username = $request->input('username');
            $userA->name = $username;
            $save = $userA->save();
            Log::channel('stdout')->info("editUsername save => ".$save);
            $message['edited'] = true;
            $message['msg'] = C::OK_USERNAMEUPDATED;
            //If an authenticad user was found
        }//if($userA != null){
        else
            $message['msg'] = C::ERR_NOTABLEGETUSERINFO;
        return $message;
    }

    public function editPassword(EditPasswordRequest $request,$auth_id){
        Log::channel('stdout')->info("editPassword auth_id => ".$auth_id);
        $message = array();
        $message['edited'] = false;
        $message['title'] = C::TITLE_EDITPASSWORD;
        $userA = $this->getUser($auth_id);
        if($userA != null){
            Log::debug("userA != null");
            Log::debug("request => ".var_export($request->all(),true));
            $password = $request->input('oldpwd');
            if(Hash::check($password,$userA->password)){
                $newPassword = $request->input('newpwd');
                $userA->password = Hash::make($newPassword);
                $userA->save();
                $message['edited'] = true;
                $message['msg'] = C::OK_PASSWORDUPDATED;
                //Actual password is correct
            }//if(Hash::check($password,$userA->password)){
            else{
                Log::debug("hash password error");
                $message['msg'] = C::ERR_PASSWORDINCORRECT;
            }     
        }//if($userA != null){
        else{
            Log::debug("userA = null");
            $message['msg'] = C::ERR_NOTABLEGETUSERINFO;
        }
        return $message;
    }

    //Get Authenticated user info
    public function getUser($auth_id){
        $user = null;
        if(isset($auth_id)){
            $user = User::find($auth_id);
        }
        return $user;
    }

}
?>