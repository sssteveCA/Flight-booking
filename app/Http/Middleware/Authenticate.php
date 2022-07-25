<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    /* protected function redirectTo($request)
    {
        Log::channel('stdout')->info("Authenticate redirectTo");
        Log::channel('stdout')->info("Authenticate redirectTo request => ".var_export($request->all(),true));
        if (! $request->expectsJson()) {
            //return route('login',['params' => $request->all()]);
            return route('login');
        }
    } */

    public function handle($request, Closure $next, ...$guards)
    {
        Log::channel('stdout')->info("Authenticate handle");

        if(!Auth::check()){
            //User is not authenticated
            if($request->isMethod('post')){
                //If request method is POST
                $request->flash();
                return redirect()->route('login')->withInput();        
            }//if($request->isMethod('post')){
            return redirect()->route('login');
        }//if(!Auth::check()){
        return $next($request);
    }
}
