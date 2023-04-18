<?php

namespace App\Http\Middleware;

use App\Interfaces\Paths as P;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
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
        $path = $request->path();
        $api_request = str_starts_with($path,'api/');
        if($api_request === false){ 
            $route_params = [];
            if($request->isMethod('POST')){
                //Method of request is POST
                if($request->routeIs(P::ROUTE_BOOKFLIGHT)){
                    //Route name when flight prices are shown
                    $route_params = $this->routeBookflightData($request);
                }//if($request->routeIs(P::ROUTE_FLIGHTPRICE)){
                else if($request->routeIs(P::ROUTE_BOOKHOTEL)){
                    $route_params = $this->routeBookhotelData($request);
                }//Route name when hotel prices are shown
                else if($request->routeIs(P::ROUTE_BOOKCARRENTAL)){
                    $route_params = $this->routeBookCarRentalData($request);
                }
            }//if($request->isMethod('post')){
            if (! $request->expectsJson()) {
                //return route('login',['flights' => $request->all()]);
                return route('login',$route_params);
            }
        }//if(!$api_request){ 
    } 

    /**
     * Booking flight data to send to the login page if the user is not authenticated
     * @param \Illuminate\Http\Request $request
     */
    private function routeBookflightData(Request $request): array{
        return [
            'session_id' => $request->input('session_id'),
            'flight_type' => $request->input('flight_type'),
            'flights' => $request->input('flights')
        ];
    }

    /**
     * Booking hotel data to send to the login page if the user is not authenticated
     * @param \Illuminate\Http\Request $request
     */
    private function routeBookhotelData(Request $request): array{
        return [
            'session_id' => $request->session_id,
            'hotel' => $request->input('hotel')
        ];
    }

    /**
     * Booking car data to send to the login page if the user is not authenticated
     * @param \Illuminate\Http\Request $request
     */
    private function routeBookCarRentalData(Request $request): array{
        return [
            'session_id' => $request->session_id,
            'carrental' => $request->input('carrental')
        ];
    }
}
