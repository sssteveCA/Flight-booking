<?php

namespace App\Traits\Common;

use App\Classes\UserManagerApi;
use App\Classes\UserManager;
use App\Http\Requests\api\EditPasswordRequestApi;
use App\Http\Requests\api\EditUsernameRequestApi;
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
     * Edit the logged user password when the response is expected to be JSON type
     * @param EditPasswordRequestApi $request
     * @return bool
     */
    private function editPasswordApi(EditPasswordRequestApi $request):bool {
        if(isset($this->auth_id)){
            $edit = $this->usermanager_api->editPassword($request,$this->auth_id);
            if($edit['edited'])return true;
        }//if(isset($this->auth_id)){
        return false;
    }

    /**
     * Edit the logged user password when the response is expected to be HTML type
     * @param EditPasswordRequest $request
     * @return bool
     */
    private function editPasswordWeb(EditPasswordRequest $request):array {
        if(isset($this->auth_id))
            return $this->usermanager->editPassword($request,$this->auth_id);
        return [
            C::KEY_CODE => 404, C::KEY_DONE => false, 'edited' => false, C::KEY_MESSAGE => C::ERR_PASSWORDUPDATE
        ];
    }

    /**
     * Edit the logged user username when the response is expected to be JSON type
     * @param EditUsernameRequestApi $request
     * @return bool
     */
    private function editUsernameApi(EditUsernameRequestApi $request): bool{
        if(isset($this->auth_id)){
            $edit = $this->usermanager_api->editUsername($request,$this->id);
            if($edit['edited'])return true;
        }//if(isset($this->auth_id)){
        return false;
    }

     /**
     * Edit the logged user username when the response is expected to be HTML type
     * @param EditUsernameRequest $request
     * @return array
     */
    private function editUsernameWeb(EditUsernameRequest $request): array{
        if(isset($this->auth_id))
            return $this->usermanager->editUsername($request,$this->auth_id);
        return [
            C::KEY_CODE => 404, C::KEY_DONE => false, 'edited' => false, C::KEY_MESSAGE => C::ERR_USERNAMEUPDATE
        ];
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