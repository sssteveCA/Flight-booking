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
        $route_params = [];
        if($request->isMethod('POST')){
            //Method of request is POST
            if($request->routeIs(P::ROUTE_BOOKFLIGHT)){
                //Route name when flight prices are shown
                $params = $request->input('flights');
                $route_params = $params;
                //$route_params = $this->flights_unquote($params);
                Log::channel('stdout')->info("Authenticate redirectTo request => ".var_export($route_params,true));
                $route_params = [
                    'flight_type' => $request->input('flight_type'),
                    'flights' => $route_params];
                //$request->flash();
            }//if($request->routeIs(P::ROUTE_FLIGHTPRICE)){
        }//if($request->isMethod('post')){
        if (! $request->expectsJson()) {
            //return route('login',['flights' => $request->all()]);
            return route('login',$route_params);
        }
    } 

    //Remove backslashes from flights array keys
    private function flights_unquote(array $flights_quoted): array{
        $flights_unquoted = [];
        foreach($flights_quoted as $key => $val){
            //Log::channel('stdout')->info("Flights unquote 1st foreach {$key}");
            $flights_unquoted[$key] = [];
            foreach($val as $sub_key => $sub_val){
                $sub_key_unq = str_replace("'","",$sub_key);
                //Log::channel('stdout')->info("Flights unquote 2nd foreach before slashes remove {$sub_key} => {$sub_val}");
                //Log::channel('stdout')->info("Flights unquote 2nd foreach {$sub_key_unq} => {$sub_val}");
                $flights_unquoted[$key][$sub_key_unq] = $sub_val;
            }
        }
        return $flights_unquoted;
    }
}
