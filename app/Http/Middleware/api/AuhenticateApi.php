<?php

namespace App\Http\Middleware\api;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Constants as C;

class AuhenticateApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('api')->check()){
            //Invalid token
            return response()->json([
                'status' => 'ERROR',
                C::KEY_MESSAGE => C::ERR_NOTAUTHENTICATED
            ],401, [],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        return $next($request);
    }
}
