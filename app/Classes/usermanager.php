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