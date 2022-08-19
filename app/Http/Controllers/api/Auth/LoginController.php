<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    //overriding method
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $response = array();
        $response['logged'] = false;
        //Log::info("LoginController login");
        //Log::info("LoginController login request => ".var_export($request->all(),true));
        try{
            $this->validateLogin($request);
            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if (method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)) {
                    Log::info("LoginController login method_exists");
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }
            if ($this->attemptLogin($request)) {
                //Log::info("LoginController attemptLogin");
                if ($request->hasSession()) {
                    //Log::info("LoginController session");
                    $request->session()->put('auth.password_confirmed_at', time());
                }
                $response = $this->sendLoginResponse($request);
            }//if ($this->attemptLogin($request)) {
            else{
                // If the login attempt was unsuccessful we will increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                $this->incrementLoginAttempts($request);
                //Log::info("LoginController increment");
                $response = $this->sendFailedLoginResponse($request);
            }
        }
        catch(ValidationException $ve){
            //Log::info("LoginController ValidationException");
            $response['errors'] = $ve->validator->errors()->first();
        } 
        //Log::info("LoginController login ".var_export($response,true));
        return $response;
    }

    //Overriding method
    protected function sendFailedLoginResponse(Request $request)
    {
        //Log::debug("LoginController sendFailedLoginResponse");
        $response = array();
        $response['logged'] = false;
        if(!User::where('email',$request->email)->first()){
            //No account found with email entered
            $response['errors'] = Constants::ERR_EMAILNOTFOUND;
        }//if(!User::where('email',$request->email)->first()){
        else if(!User::where('email',$request->email)->where('password',Hash::make($request->password))->first()){
            //Incorrect password
            $response['errors'] = Constants::ERR_PASSWORDINCORRECTLOGIN;
        }//if(!User::where('email',$request->email)->where('password',Hash::make($request->password))->first()){
        else{
            //Other errors
            $response['errors'] = Constants::ERR_INVALIDCREDENTIALS;
        }
        return $response;
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        //DB::enableQueryLog();
        $response = array();
        $response['logged'] = false;
        //Log::debug("LoginController sendLoginResponse");
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            //Log::debug("LoginController sendLoginResponse authenticated");
            return $response;
        }
        //email input value
        $email = $request->email;
        //password input value
        $password = $request->password;
        //password as of $password
        //Check if user account is verified
        $userCheck = User::where('email',$email)->first();
        if($userCheck != null){
            $hashCkeck = Hash::check($password,$userCheck->password);
            if($hashCkeck){
                if($userCheck->email_verified_at != null){
                    //Account was verified
                    $response['logged'] = true;
                }
                else{
                    //Account not verified yet
                    $response['errors'] = Constants::ERR_VERIFYYOURACCOUNT;
                }
            }//if($hashCkeck){
            else{
                $response['errors'] = Constants::ERR_PASSWORDINCORRECTLOGIN;
            }
        }//if($userCheck != null){
        else{
            $response['errors'] = Constants::ERR_EMAILNOTFOUND;
        }
        //$response['query'] = DB::getQueryLog();
        return $response;
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        //Log::debug("LoginController validatedLogin");
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
}
