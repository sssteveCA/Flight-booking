<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiUserManager;
use App\Http\Controllers\Controller;
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

    //editUsername from API route
    public function editUsername(ApiEditUsernameRequest $request){
        Log::channel('stdout')->info("ApiInfoController editUsername");
        if(isset($request->validator) && $request->validator->fails()){
            //Input username validation fail
            $this->response = array('error',$request->validator->errors()->first());
            return response()->json($this->response,400,array(),JSON_UNESCAPED_UNICODE);
        }
        //Validation OK
        $this->response = $this->apiusermanager->editUsername($request);
        if($this->response['edited']){
            //name field of user logged edited
            $httpCode = 200;
        }
        else
            $httpCode = 400; //Failed because not found a user with this 'auth_id'
        return response()->json($this->response,400,array(),JSON_UNESCAPED_UNICODE);
    }
}
