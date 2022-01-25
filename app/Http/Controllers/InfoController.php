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
    private $auth_id;
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    public $incrementing = true;

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
            return response()->view('error/404',['msg' => 'L\' utente specificato non esiste'],404);

    }

    //edit username
    public function editUsername(Request $request){
        Log::channel('stdout')->info("editUsername");
        //Log::channel('stdout')->info("editUsername request => ".var_export($request,true));
        //Check if username input is correct
        /*$validator = $request->validate();
        Log::channel('stdout')->info("editUsername validator => ".var_export($validator,true));*/
        $edit = $this->usermanager->editUsername($request,$this->auth_id);
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
