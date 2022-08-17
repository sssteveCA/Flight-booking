<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Traits\Common\RegisterControllerCommonTrait;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RegisterControllerApi extends Controller
{
    //
    use RegisterControllerCommonTrait,RegistersUsers{
        RegisterControllerCommonTrait::registered insteadOf RegistersUsers;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        Log::channel('stdout')->info("RegisterControllerApi register");
        $inputs = $request->all();
        //Log::channel('stdout')->info("RegisterControllerApi register inputs => ".var_export($inputs,true));
        try{
            $this->validator($inputs)->validate();
            //Add the new subscriber to DB
            //Log::channel('stdout')->info("RegisterControllerApi register validated");
            event(new Registered($user = $this->create($request->all())));
            //Log::channel('stdout')->info("RegisterControllerApi register event");
            //Registered user login with his account
            //$this->guard()->login($user);
            //Log::channel('stdout')->info("RegisterControllerApi register login guard");
            if($this->registered($request,$user)){
                //Log::channel('stdout')->info("RegisterControllerApi register user registered");
                //Registration successfully completed
                //return response()->view(P::VIEW_SUBSCRIBED,['message' => C::OK_REGISTRATION],201);
                return response()->json([
                    C::KEY_STATUS => 'OK',
                    C::KEY_MESSAGE => C::OK_REGISTRATION
                ],201,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }
            throw new HttpResponseException(
                response()->json([
                    C::KEY_STATUS => 'ERROR',
                    C::KEY_MESSAGE => C::ERR_REGISTRATION
                ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
            );
            
        }catch(\Exception $e){
            if($e instanceof ValidationException){
                Log::channel('stdout')->info("RegisterController register ValidationException");
                $errors = $e->errors();
                //Log::channel('stdout')->info("RegisterController register ValidationException errors => ".var_export($errors,true));
                throw new HttpResponseException(
                    response()->json([
                        C::KEY_STATUS => 'ERROR',
                        C::KEY_MESSAGE => $errors
                    ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
                );
            }
        }
    }
}
