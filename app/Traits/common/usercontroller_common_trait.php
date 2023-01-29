<?php

namespace App\Traits\Common;

use App\Classes\UserManager;
use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUsernameRequest;
use App\Http\Requests\UserDeleteRequest;
use App\Interfaces\Constants as C;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * This trait contains common code between UserController & UserControllerApi
 */
trait UserControllerCommonTrait{
    private UserManager $usermanager;
    private $auth_id;

    /**
     * Delete the logged user account when the response is expected to be JSON type
     */
    private function deleteAccountApi():bool {
        $user = $this->getDataCommon();
        if($user != null){
            $userTokens = $user->tokens;
            foreach($userTokens as $token)
                //revoke all tokens
                $token->revoke();
            //Delete all flights associated to this user
            Flight::where('user_id',$this->auth_id)->delete();
            //Delete user record in MySQL
            $user->delete();
            return true;
        }
        return false;
    }

    /**
     * Delete the logged user account when the response is expected to be HTML type
     */
    private function deleteAccountWeb():bool {
        $user = $this->getDataCommon();
        if($user != null){
            auth()->logout();
            //Delete all flights associated to this user
            Flight::where('user_id',$this->auth_id)->delete();
            //Delete user record in MySQL
            $user->delete();
            return true;
        }//if($user != null){
        return false;
    }

    /**
     * Get user data by id
     */
    private function getDataCommon(){
        if(isset($this->auth_id))
            return $this->usermanager->getUser($this->auth_id);
        return null;
    }
}
?>