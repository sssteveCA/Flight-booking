<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiUserManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\ApiEditPasswordRequest;
use App\Http\Requests\api\ApiEditUsernameRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiInfoController extends Controller
{
    private $apiusermanager;
    private $response;

    public function __construct()
    {
        $this->apiusermanager = new ApiUserManager();
    }

    //edit user logged username from API route
    public function editUsername(ApiEditUsernameRequest $request){
        //Log::channel('stdout')->info("ApiInfoController editUsername headers => ".var_export($request->headers,true));
        //Log::channel('stdout')->info("ApiInfoController editUsername request => ".var_export($request->all(),true));
        if(isset($request->validator) && $request->validator->fails()){
            //Input username validation fail
            $this->response = array('error',$request->validator->errors()->first());
            return response()->json($this->response,400,array(),JSON_UNESCAPED_UNICODE);
        }
        //Validation OK
        $this->response = $this->apiusermanager->editUsername($request);
        if($this->response['edited'])
            $httpCode = 200; //name field of user logged updated 
        else
            $httpCode = 400; //Failed because not found a user with this 'auth_id'
        return response()->json($this->response,$httpCode,array(),JSON_UNESCAPED_UNICODE);
    }

    //edit password logged user from API route
    public function editPassword(ApiEditPasswordRequest $request){
        Log::channel('stdout')->info("ApiInfoController editPassword");
        if(isset($request->validator) && $request->validator->fails()){
            //Input password validation fail
            $this->response = array('error' => $request->validator->errors()->first());
            return response()->json($this->response,400,array(),JSON_UNESCAPED_UNICODE);  
        }
        //Validation OK
        $this->response = $this->apiusermanager->editPassword($request);
        if($this->response['edited'])
            $httpCode = 200; //password of logged user updated
        else
            $httpCode = 400; //Failed because not found a user with this 'auth_id'
        return response()->json($this->response,$httpCode,array(),JSON_UNESCAPED_UNICODE);
    }
}
