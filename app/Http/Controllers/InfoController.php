<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUsernameRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use UserManager;

class InfoController extends Controller
{
    private $usermanager;
    private $auth_name;
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function __construct()
    {
        $this->auth_name = Auth::user()->name;
        Log::channel('stdout')->info("InfoController auth_name => ".var_export($this->auth_name,true));
        $this->usermanager =  new UserManager();   
    }

    //get user info
    public function getData(){
        $userAuth = $this->usermanager->getUser($this->auth_name);
        Log::channel('stdout')->info("userAuth => ".var_export($userAuth,true));
        if($userAuth != null){
            return response()->view('profile/info',['user' => $userAuth],200);
        }
        else
            return response()->view('error/404',['msg' => 'L\' utente specificato non esiste'],404);

    }

    //edit username
    public function editUsername(EditUsernameRequest $request){
        $auth = new Auth;
        Log::channel('stdout')->debug("InfoChannel Auth => ".var_export($auth,true));
        //Check if username input is correct
        $request->validate();
        $edit = $this->usermanager->editUsername($request,$this->auth_name);
        if($edit['edited']){
            //Username was updated
            return response($edit['msg'],204);
        }
        else{
            //Username was not updated
            return response()->view('error/404',$edit['msg'],404);
        }
    }

    //edit password
    public function editPassword(Request $request){
        return 'editPassword';
    }
}
