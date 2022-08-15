<?php

namespace App\Http\Middleware;

use App\Interfaces\Paths as P;
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
     protected function redirectTo($request)
    {
        Log::channel('stdout')->info("Authenticate redirectTo");
        $path = $request->path();
        Log::channel('stdout')->info("Authenticate redirectTo path => ".var_export($path,true));
        $api_request = str_starts_with($path,'api/');
        Log::channel('stdout')->info("Authenticate redirectTo str starts with => ".var_export($api_request,true));
        if($api_request === false){ 
            Log::channel('stdout')->info("Authenticate redirectTo api_request");
            //Log::channel('stdout')->info("Authenticate redirectTo host => ".var_export($request,true));
            $route_params = [];
            if($request->isMethod('POST')){
                //Method of request is POST
                if($request->routeIs(P::ROUTE_BOOKFLIGHT)){
                    //Route name when flight prices are shown
                    $params = $request->input('flights');
                    $route_params = $params;
                    //$route_params = $this->flights_unquote($params);
                    $route_params = [
                        'session_id' => $request->input('session_id'),
                        'flight_type' => $request->input('flight_type'),
                        'flights' => $route_params];
                        Log::channel('stdout')->info("Authenticate redirectTo request => ".var_export($route_params,true));
                    $request->flash();
                }//if($request->routeIs(P::ROUTE_FLIGHTPRICE)){
            }//if($request->isMethod('post')){
            if (! $request->expectsJson()) {
                //return route('login',['flights' => $request->all()]);
                return route('login',$route_params);
            }
        }//if(!$api_request){ 
    } 
}
