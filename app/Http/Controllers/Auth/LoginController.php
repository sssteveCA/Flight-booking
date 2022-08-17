<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
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

   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request, $user)
    {
        $data = $request->all();
        Log::channel('stdout')->debug("LoginController.php authenticated");
        //Log::channel('stdout')->debug("LoginController.php authenticated request => ".var_export($data,true));
        if(isset($data['flights'])){
            $response = [
                    'session_id' => $data['session_id'],
                    'flight_type' => $data['flight_type'],
                    'inputs' => '',
                    'flights' => $data['flights']
            ];
            session()->put('response',$response);
            return redirect()->route(P::ROUTE_FLIGHTPRICE_GET);
        }//if(isset($data['flights'])){
    }

    //override
    public function login(Request $request)
    {
        /* Log::info("LoginController login");
        Log::info("LoginController login request => ".var_export($request->all(),true)); */
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
                //Log::info("LoginController login method_exists");
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            //Log::info("LoginController attemptLogin");
            if ($request->hasSession()) {
                //Log::info("LoginController session");
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        //Log::info("LoginController increment");
        return $this->sendFailedLoginResponse($request);
    }

    //Overriding method
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(P::URL_ROOT);
    }

     //Overriding method
     protected function sendFailedLoginResponse(Request $request)
     {
         /*throw ValidationException::withMessages([
             $this->username() => [trans('auth.failed')],
         ]);*/
         if(!User::where('email',$request->email)->first()){
             //No account found with email entered
             return response()->view(P::VIEW_FALLBACK,[C::KEY_MESSAGE => trans('auth.email')],400);
         }//if(!User::where('email',$request->email)->first()){
         if(!User::where('email',$request->email)->where('password',Hash::make($request->password))->first()){
             //Incorrect password
             return response()->view(P::VIEW_FALLBACK,[C::KEY_MESSAGE => trans('auth.password')],400);
         }//if(!User::where('email',$request->email)->where('password',Hash::make($request->password))->first()){
             //Other errors
             return response()->view(P::VIEW_FALLBACK,[C::KEY_MESSAGE => trans('auth.failed')],400);
         
     }

     //Overriding method
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }

}
