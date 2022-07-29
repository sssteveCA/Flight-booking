<?php

namespace App\Traits\Common;

use App\Classes\UserManager;
use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUsernameRequest;
use App\Interfaces\Constants as C;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

//This trait contains common code between UserController & UserControllerApi
trait UserControllerCommonTrait{
    private UserManager $usermanager;
    private $auth_id;

    //edit username
    public function editUsername(EditUsernameRequest $request){
        Log::channel('stdout')->info("editUsername");
        $edit = $this->usermanager->editUsername($request,$this->auth_id);
        Log::debug("UserController CommonTrait editpassword message ".var_export($edit,true));
        if($edit['edited']){
            //Username was updated
            Log::info("edit => ".var_export($edit,true));
            //return response()->view(P::VIEW_PROFILE_EDIT,$edit,200);
            return response()->json($edit,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        else{
            //Username was not updated
            /* return view(P::VIEW_FALLBACK)->with([
                C::KEY_MESSAGES => [$edit['msg']]
            ]); */
            return response()->json([
                C::KEY_MESSAGE => $edit[C::KEY_MESSAGE]
            ],404,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }

    //edit password
    public function editPassword(EditPasswordRequest $request){
        Log::channel('stdout')->info("UserController CommonTrait editPassword request "); 
        $edit = $this->usermanager->editPassword($request,$this->auth_id);
        if($edit['edited']){
            //Password was edited
            //return response()->view(P::VIEW_PROFILE_EDIT,$edit,200);
            return response()->json($edit,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        } 
        else{
            //Password was not updated
            //return view(P::VIEW_FALLBACK)->with([C::KEY_MESSAGES => [$edit['msg']]]);
            return response()->json([
                C::KEY_MESSAGE => $edit[C::KEY_MESSAGE]
            ],404,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }
}
?>