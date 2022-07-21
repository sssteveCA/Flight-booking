<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\Paths as P;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = P::URL_ROOT;


    //Overriding method
    protected function sendFailedLoginResponse(Request $request)
    {
        /*throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);*/
        if(!User::where('email',$request->email)->first()){
            //No account found with email entered
            return view(P::VIEW_FALLBACK)->withErrors(['message' => trans('auth.email')]);
        }//if(!User::where('email',$request->email)->first()){
        if(!User::where('email',$request->email)->where('password',Hash::make($request->password))->first()){
            //Incorrect password
            return view(P::VIEW_FALLBACK)->withErrors(['message' => trans('auth.password')]);
        }//if(!User::where('email',$request->email)->where('password',Hash::make($request->password))->first()){
            //Other errors
            return view(P::VIEW_FALLBACK)->withErrors(['message' => trans('auth.failed')]);
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //override
    public function login(Request $request)
    {
        Log::info("LoginController login");
        Log::info("LoginController login request => ".var_export($request->all(),true));
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
            Log::info("LoginController attemptLogin");
            if ($request->hasSession()) {
                Log::info("LoginController session");
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        Log::info("LoginController increment");
        return $this->sendFailedLoginResponse($request);
    }

}
