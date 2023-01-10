<?php

use App\Http\Controllers\api\Auth\LoginController;
use App\Http\Controllers\api\Auth\RegisterControllerApi;
use App\Http\Controllers\api\InfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Paths as P;
use App\Http\Controllers\api\welcome\FlightSearchControllerApi;
use App\Http\Controllers\api\Auth\LoginControllerApi;
use App\Http\Controllers\api\Auth\LogoutControllerApi;
use App\Http\Controllers\api\EmailControllerApi;
use App\Http\Controllers\api\FlightControllerApi;
use App\Http\Controllers\api\HotelControllerApi;
use App\Http\Controllers\api\PostControllerApi;
use App\Http\Controllers\api\UserControllerApi;
use App\Http\Controllers\api\welcome\FlightEventsControllerApi;
use App\Http\Controllers\api\welcome\HotelSearchControllerApi;

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
    Route::get(P::URL_AIRPORTS_AVAILABLE,[FlightSearchControllerApi::class,'getAvailableAirports']);
    Route::get(P::URL_COMPANIESSEARCH,[FlightSearchControllerApi::class,'getFlightCompanies']);
    Route::get(P::URL_FLIGHTEVENTS,[FlightEventsControllerApi::class, 'getAll']);
    Route::post(P::URL_SENDEMAIL,[EmailControllerApi::class,'sendEmail'])->name(P::ROUTE_SENDEMAIL);
    Route::post(P::URL_FLIGHTPRICE,[FlightSearchControllerApi::class,'getFlightPrice'])->name(P::ROUTE_FLIGHTPRICE);
    Route::get(P::URL_HOTELS_AVAILABLE,[HotelSearchControllerApi::class,'getAvailableHotels']);
    Route::get(P::URL_HOTELINFO,[HotelSearchControllerApi::class,'getHotelInfo']);
    Route::post(P::URL_HOTELPRICE,[HotelSearchControllerApi::class,'getHotelPrice'])->name(P::ROUTE_HOTELPRICE);
    Route::apiResource(P::PREFIX_NEWS,PostControllerApi::class)->only([
        'index','show'
    ]);
});

Route::group(['prefix' => P::PREFIX_PROFILE,'middleware' => ['custom_auth_api','verified']], function(){
    //Route of user personal area
    Route::name('api.')->group(function(){
        Route::apiResource(P::PREFIX_MYFLIGHTS,FlightControllerApi::class)->except(['update']);
        Route::apiResource(P::PREFIX_MYHOTELS, HotelControllerApi::class)->except(['update']);
        Route::get(P::URL_INFO,[UserControllerApi::class,'getData'])->name(P::ROUTE_INFO);
        Route::patch(P::URL_EDITUSERNAME,[UserControllerApi::class,'editUsername'])->name(P::ROUTE_EDITUSERNAME);
        Route::patch(P::URL_EDITPASSWORD,[UserControllerApi::class,'editPassword'])->name(P::ROUTE_EDITPASSWORD);
        Route::delete(P::URL_DELETEACCOUNT,[UserControllerApi::class,'deleteAccountHard'])->name(P::ROUTE_DELETEACCOUNT);
    });
});

Route::middleware(['custom_auth_api','verified'])->group(function(){
    Route::name('api.')->group(function(){
        Route::post(P::URL_LOGOUT,[LogoutControllerApi::class,'logout'])->name('logout');
    });
});