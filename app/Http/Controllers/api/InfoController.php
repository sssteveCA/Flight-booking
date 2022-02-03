<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
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
        $this->auth_id = Auth::id();
        $this->usermanager = new UserManager();
    }

    //edit username
    public function editUsername(EditUsernameRequest $request){
        Log::channel('stdout')->info("API InfoController editUsername");
        if(isset($request->validator) && $request->validator->fails()){
            //Input validation fail
            $messages = $request->validator->messages();
            return view('error/errors')->withErrors($messages);
        }//if(isset($request->validator) && $request->validator->fails()){
        $edit = $this->usermanager->editUsername($request,$this->auth_id);
        Log::channel('stdout')->info("API InfoController editUsername => ".var_export($edit,true));
        return response()->json(['msg' => $edit['msg']],200,array(),JSON_UNESCAPED_UNICODE);     
    }
}
