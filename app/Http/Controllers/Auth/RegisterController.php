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

    use RegistersUsers,RegisterControllerCommonTrait;

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
        Log::channel('stdout')->info("RegisterController register");
        $inputs = $request->all();
        Log::channel('stdout')->info("RegisterController register inputs => ".var_export($inputs,true));
        try{
            $this->validator($inputs)->validate();
            //Add the new subscriber to DB
            Log::channel('stdout')->info("RegisterController register validated");
            event(new Registered($user = $this->create($request->all())));
            Log::channel('stdout')->info("RegisterController register event");
            //Registered user login with his account
            //$this->guard()->login($user);
            Log::channel('stdout')->info("RegisterController register login guard");
            if($this->registered($request,$user)){
                Log::channel('stdout')->info("RegisterController register user registered");
                //Registration successfully completed
                //return response()->view(P::VIEW_SUBSCRIBED,['message' => C::OK_REGISTRATION],201);
                return response()->route(P::VIEW_SUBSCRIBED,[
                    'status' => 'OK',
                    'message' => C::OK_REGISTRATION
                ]);
            }
            throw new HttpResponseException(
                response()->view(P::VIEW_REGISTER,['status' => 'ERROR',
                'message' => C::ERR_REGISTRATION],500)
            );
            
        }catch(Exception $e){
            if($e instanceof ValidationException){
                Log::channel('stdout')->info("RegisterController register ValidationException");
                $errors = $e->errors();
                Log::channel('stdout')->info("RegisterController register ValidationException errors => ".var_export($errors,true));
                throw new HttpResponseException(
                    response()->view(P::VIEW_REGISTER,[
                        'status' => 'ERROR',
                        'rc_errors' => $errors],400)
                );
            }
        }

    }

}
