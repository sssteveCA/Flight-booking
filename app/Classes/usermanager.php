<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserManager{

    private $auth_id;

    public function __construct()
    {
        $this->auth_id = Auth::id();
        Log::channel('stdout')->info("Functions Auth id ".$this->auth_id);
    }

    public function editUsername(Request $request){
        $message = array();
        $userA = $this->getUser();
        if($request->filled('username')){
            //If username input field exists and it's not empty
            if($userA != null){
                //If an authenticad user was found
            }//if($userA != null){
            else
                $message['msg'] = "Impossibile ottenere informazione sull'utente loggato";
        }//if($request->filled('username')){
        else
            $message['msg'] = "Devi inserire uno username valido prima di continuare";
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