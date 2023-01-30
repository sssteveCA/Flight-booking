<?php
namespace App\Classes;

use App\Http\Requests\api\ApiEditPasswordRequest;
use App\Http\Requests\api\ApiEditUsernameRequest;
use App\Http\Requests\api\EditPasswordRequestApi;
use App\Http\Requests\api\EditUsernameRequestApi;
use App\Models\User;
use App\Traits\Common\UserManagerCommonTrait;
use App\Interfaces\Constants as C;
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

    public function editUsername(EditUsernameRequestApi $request):array {
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
            return [
                C::KEY_CODE => 200, C::KEY_DONE => true, 'edited' => true, C::KEY_MESSAGE => C::OK_USERNAMEUPDATED
            ];
        }//if($userA != null){
        return [
            C::KEY_CODE => 404, C::KEY_DONE => false, 'edited' => false, C::KEY_MESSAGE => C::ERR_USERNAMEUPDATE
        ];
    }

    public function editPassword(EditPasswordRequestApi $request){
        //Log::channel('stdout')->debug('UserManagerApi editPassword');
        $message = array();
        $message['edited'] = false;
        $userA = $this->getUser();
        if($userA != null){
            //User logged found
            //$oldpwd = $request->oldpwd;
            $newpwd = $request->newpwd;
            //if(Hash::check($oldpwd,$userA->password)){
                //Create an hash for new password and save it
                $userA->password = Hash::make($newpwd);
                $userA->save();
                $message[C::KEY_DONE] = true;
                $message['edited'] = true;
                $message[C::KEY_MESSAGE] = C::OK_PASSWORDUPDATED;
           /*  }
            else{
                //Log::debug("hash password error");
                $message[C::KEY_DONE] = false;
                $message['edited'] = false;
                $message[C::KEY_MESSAGE] = C::ERR_PASSWORDINCORRECT;
            }   */
        }//if($userA != null){
        else{
            $message[C::KEY_DONE] = false;
            $message['edited'] = false;
            $message[C::KEY_MESSAGE] = C::ERR_NOTABLEGETUSERINFO;
        }
        return $message;
    }
}
?>