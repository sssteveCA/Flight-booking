<?php

namespace App\Classes;

use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUsernameRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Constants as C;
use App\Traits\Common\UserManagerCommonTrait;

class UserManager{

    use UserManagerCommonTrait;

    private $auth_id;

    public function __construct()
    {
        $this->auth_id = Auth::id();
    }

    public function editUsername(EditUsernameRequest $request,$auth_id):array {
        $userA = $this->getUser($auth_id);
        //If username input field exists and it's not empty
        if($userA != null){
            $username = $request->input('username');
            $userA->name = $username;
            $save = $userA->save();
            return [
                    C::KEY_CODE => 200, C::KEY_DONE => true, 'edited' => true, C::KEY_MESSAGE => C::OK_USERNAMEUPDATED
            ];
            //If an authenticad user was found
        }//if($userA != null){
        return [
            C::KEY_CODE => 404, C::KEY_DONE => false, 'edited' => false, C::KEY_MESSAGE => C::ERR_USERNAMEUPDATE
        ];
    }

    public function editPassword(EditPasswordRequest $request,$auth_id):array {
        $userA = $this->getUser($auth_id);
        if($userA != null){
           /*  $password = $request->input('oldpwd');
            if(Hash::check($password,$userA->password)){ */
                $newPassword = $request->input('newpwd');
                $userA->password = Hash::make($newPassword);
                $userA->save();
                return [
                    C::KEY_CODE => 200, C::KEY_DONE => true, 'edited' => true, C::KEY_MESSAGE => C::OK_PASSWORDUPDATED
                ];
                //Actual password is correct
            /* }//if(Hash::check($password,$userA->password)){
            return [
                    C::KEY_CODE => 401, C::KEY_DONE => false, 'edited' => false, C::KEY_MESSAGE => C::ERR_PASSWORDINCORRECT
                ];
                */  
        }//if($userA != null){
        return [
            C::KEY_CODE => 404, C::KEY_DONE => false, 'edited' => false, C::KEY_MESSAGE => C::ERR_PASSWORDUPDATE
        ];
    }

}
?>