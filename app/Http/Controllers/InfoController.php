<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUsernameRequest;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use UserManager;


class InfoController extends Controller
{
    private $usermanager;
    private $auth_id;
    /*protected $connection = 'mysql';
    protected $primaryKey = 'id';
    public $incrementing = true;*/

    public function __construct()
    {
        $this->auth_id = Auth::id();
        //Log::channel('stdout')->info("InfoController auth_id => ".var_export($this->auth_id,true));
        $this->usermanager =  new UserManager();   
    }

    //get user info
    public function getData(){
        $userAuth = $this->usermanager->getUser($this->auth_id);
        //Log::channel('stdout')->info("userAuth => ".var_export($userAuth,true));
        if($userAuth != null){
            return response()->view('profile/info',['user' => $userAuth],200);
        }
        else
            return response()->view(P::VIEW_FALLBACK,[
                C::KEY_MESSAGES => [C::ERR_URLNOTFOUND_NOTALLOWED]
            ],404);

    }

    //edit username
    public function editUsername(EditUsernameRequest $request){
        Log::channel('stdout')->info("editUsername");
        if(isset($request->validator) && $request->validator->fails()){
            //If username form fails validation
            $messages = $request->validator->messages();
            return view(P::VIEW_FALLBACK)->with(['messages' => $messages]);
        }//if(isset($request->validator) && $request->validator->fails()){
        $edit = $this->usermanager->editUsername($request,$this->auth_id);
        Log::debug("InfoController editpassword message ".var_export($edit,true));
        if($edit['edited']){
            //Username was updated
            Log::info("edit => ".var_export($edit,true));
            return response()->view('profile/edit',$edit,200);
        }
        else{
            //Username was not updated
            return view(P::VIEW_FALLBACK)->with([
                'messages' => [$edit['msg']]
            ]);
        }
    }

    //edit password
    public function editPassword(EditPasswordRequest $request){
        Log::channel('stdout')->info("editPassword request "); 
        if(isset($request->validator) && $request->validator->fails()){
            //If change password form fails validation
            $messages = $request->validator->messages();
            return response()->view(P::VIEW_FALLBACK,
                ['messages' => $messages]
            ,400);
        }//if(isset($request->validator) && $request->validator->fails()){
        $edit = $this->usermanager->editPassword($request,$this->auth_id);
        if($edit['edited']){
            //Password was edited
            return response()->view(P::VIEW_PROFILE_EDIT,$edit,200);
        } 
        else{
            //Password was not updated
            //return response()->view('error/errors',['errors' => $edit],404);
            return view('error/errors')->with(['messages' => [$edit['msg']]]);
        }
    }
}