<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function __construct()
    {
        
    }

    //get user info
    public function getData(){
        $id = Auth::id();
        $userAuth = User::find($id);
        if($userAuth != null)
            return response()->view('profile/info',['user' => $userAuth],200);
        else
            return response()->view('error/404',['msg' => 'L\' utente specificato non esiste'],404);

    }

    //edit username
    public function editUsername(Request $request){

    }

    //edit password
    public function editPassword(Request $request){
        
    }
}
