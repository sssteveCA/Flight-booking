<?php

use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUsernameRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $message['title'] = 'Modifica username';
        $userA = $this->getUser($auth_id);
        //If username input field exists and it's not empty
        if($userA != null){
            $username = $request->input('username');
            $userA->name = $username;
            $save = $userA->save();
            Log::channel('stdout')->info("editUsername save => ".$save);
            $message['edited'] = true;
            $message['msg'] = 'Lo username è stato modificato';
            //If an authenticad user was found
        }//if($userA != null){
        else
            $message['msg'] = "Impossibile ottenere informazione sull'utente loggato";
        return $message;
    }

    public function editPassword(EditPasswordRequest $request){
        
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