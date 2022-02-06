<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUsernameRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use UserManager;

class InfoController extends Controller
{
    private $usermanager;
    private $auth_id;

    public function __construct()
    {
        Log::channel('stdout')->info("API InfoController construct");
        Log::channel('stdout')->info("API InfoController construct Auth => ".var_export(Auth::user(),true));
        $this->auth_id = Auth::id();
        $this->usermanager = new UserManager();
    }

    //edit username
    public function editUsername(EditUsernameRequest $request){
        Log::channel('stdout')->info("API InfoController editUsername");
        if(isset($request->validator) && $request->validator->fails()){
            //Input username validation fail
            $error = $request->validator->errors()->first();
            return response()->json(['error' => $error],400,array(),JSON_UNESCAPED_UNICODE);
        }//if(isset($request->validator) && $request->validator->fails()){
        $edit = $this->usermanager->editUsername($request,$this->auth_id);
        Log::channel('stdout')->info("API InfoController editUsername => ".var_export($edit,true));
        if($edit['edited']){
            //Username has been edited
            return response()->json(['msg' => $edit['msg']],200,array(),JSON_UNESCAPED_UNICODE);

        }
        //Username not edited
        return response()->json(['msg' => $edit['msg']],404,array(),JSON_UNESCAPED_UNICODE);
    }

    //edit password
    public function editPassword(EditPasswordRequest $request){
        Log::channel('stdout')->info("API InfoController editPassword");
        if(isset($request->validator) && $request->validator->fails()){
            //Input password validation fail
            $error = $request->validator->errors()->first();
            return response()->json(['error' => $error],400,array(),JSON_UNESCAPED_UNICODE);
        }//if(isset($request->validator) && $request->validator->fails()){
        $edit = $this->usermanager->editPassword($request,$this->auth_id);
        if($edit['edited']){
            //Password has been edited
            return response()->json(['msg' => $edit['msg']],200,array(),JSON_UNESCAPED_UNICODE);
        }//if($edit['edited']){
        //Password not edited
        return response()->json(['msg' => $edit['msg']],404,array(),JSON_UNESCAPED_UNICODE);
    }
}
