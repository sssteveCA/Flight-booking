<?php

use App\Http\Controllers\api\Auth\LoginController;
use App\Http\Controllers\api\Auth\RegisterControllerApi;
use App\Http\Controllers\api\InfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Paths as P;
use App\Http\Controllers\api\welcome\ApiFlightSearchController;
use App\Http\Controllers\api\welcome\FlightSearchControllerApi;
use App\Http\Controllers\api\Auth\LoginControllerApi;
use App\Http\Controllers\api\FlightControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function(){
    Route::post('/login',[LoginControllerApi::class, 'login'])->name('login');
    Route::post('/register',[RegisterControllerApi::class,'register'])->name('register');
    Route::post(P::URL_FLIGHTSEARCH,[FlightSearchControllerApi::class,'getFlightPrice'])->name(P::ROUTE_FLIGHTPRICE);
});

Route::group(['prefix' => '/profile','middleware' => 'custom_auth_api'], function(){
    //Route of user personal area
    Route::name('api.')->group(function(){
        Route::resource(P::PREFIX_MYFLIGHTS,FlightControllerApi::class);
        Route::patch('/editUsername',[InfoController::class,'editUsername'])->name(P::ROUTE_EDITUSERNAME);
        Route::patch('/editPassword',[InfoController::class,'editPassword'])->name(P::ROUTE_EDITPASSWORD);
    });
});