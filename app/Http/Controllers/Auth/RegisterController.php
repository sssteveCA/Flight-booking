<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Traits\Common\RegisterControllerCommonTrait;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegisterControllerCommonTrait,RegistersUsers{
        RegisterControllerCommonTrait::registered insteadOf RegistersUsers;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function register(Request $request)
    {
        //Log::channel('stdout')->info("RegisterController register");
        $inputs = $request->all();
        //Log::channel('stdout')->info("RegisterController register inputs => ".var_export($inputs,true));
        try{
            $this->validator($inputs)->validate();
            //Add the new subscriber to DB
            //Log::channel('stdout')->info("RegisterController register validated");
            event(new Registered($user = $this->create($request->all())));
            //Log::channel('stdout')->info("RegisterController register event");
            //Registered user login with his account
            $this->guard()->login($user);
            /* Log::channel('stdout')->info("RegisterController register login guard");
            Log::channel('stdout')->info(var_export($this->registered($request,$user),true)); */
            if($this->registered($request,$user)){
                //Log::channel('stdout')->info("RegisterController register user registered");
                //Registration successfully completed
                //return response()->view(P::VIEW_SUBSCRIBED,['message' => C::OK_REGISTRATION],201);
                return response()->view(P::VIEW_SUBSCRIBED,[
                    C::KEY_STATUS => 'OK',
                    C::KEY_MESSAGE => C::OK_REGISTRATION
                ]);
            }
             throw new Exception("");
        }catch(ValidationException $e){
            Log::channel('stdout')->info("RegisterController register ValidationException");
            $errors = $e->errors();
                //Log::channel('stdout')->info("RegisterController register ValidationException errors => ".var_export($errors,true));
            throw new HttpResponseException(
                response()->view(P::VIEW_REGISTER,[
                    C::KEY_STATUS => 'ERROR',
                    'rc_errors' => $errors],400)
            );
        }catch(Exception $e){
            //Log::channel('stdout')->info("RegisterController register ValidationException errors => ".var_export($errors,true));
            throw new HttpResponseException(
                response()->view(P::VIEW_FALLBACK,[
                    C::KEY_STATUS => 'ERROR',
                    C::KEY_MESSAGE => C::ERR_REGISTRATION],500)
            );  
        }

    } 

}
