<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use UserManager;

class InfoController extends Controller
{
    use UserManager;

    private $usermanager;
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function __construct()
    {
        $this->usermanager =  new UserManager;   
    }

    //get user info
    public function getData(){
        $userAuth = $this->usermanager->getUser();
        if($userAuth != null)
            return response()->view('profile/info',['user' => $userAuth],200);
        else
            return response()->view('error/404',['msg' => 'L\' utente specificato non esiste'],404);

    }

    //edit username
    public function editUsername(Request $request){
        $auth = new Auth;
        Log::channel('stdout')->debug("InfoChannel Auth => ".var_export($auth,true));
        $id = Auth::id();
        $user = User::find($id);
    }

    //edit password
    public function editPassword(Request $request){
        return 'editPassword';
    }
}
