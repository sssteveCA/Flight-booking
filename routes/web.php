<?php

use App\Http\Controllers\bookflight\ResumeBookFlightController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\paypal\PaypalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\welcome\FlightEventsController;
use App\Http\Controllers\welcome\FlightSearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Paths as P;
use App\Interfaces\Constants as C;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

//Private profile routes
Route::group(['prefix' => P::PREFIX_PROFILE, 'middleware' => ['auth','verified']], function(){
    Route::get(P::URL_INFO, [InfoController::class, 'getData'])->name(P::ROUTE_INFO); 
    Route::resource(P::PREFIX_MYFLIGHTS, FlightController::class)->except([
        'edit','update'
    ]);
    Route::post(P::URL_FLIGHTRESUME,[ResumeBookFlightController::class,'resumeFlight'])->name(P::ROUTE_RESUMEFLIGHT);
    Route::patch(P::URL_EDITUSERNAME,[InfoController::class,'editUsername'])->name(P::ROUTE_EDITUSERNAME);
    Route::patch(P::URL_EDITPASSWORD,[InfoController::class,'editPassword'])->name(P::ROUTE_EDITPASSWORD);
});

Route::post(P::URL_BOOKFLIGHT,[FlightController::class,'store'])->name(P::ROUTE_BOOKFLIGHT)->middleware(['auth','verified']);

Route::prefix(P::PREFIX_BOOKFLIGHT)->group(function(){
    Route::post(P::URL_BOOKFLIGHT_PAYPAL_RETURN,[PaypalController::class,'return'])->name(P::ROUTE_PAYPAL_RETURN);
    Route::get(P::URL_BOOKFLIGHT_PAYPAL_CANCEL,[PaypalController::class,'cancel'])->name(P::ROUTE_PAYPAL_CANCEL);
});

Route::get(P::URL_HOME, [HomeController::class, 'index'])->name('home');
Route::get(P::URL_AIRPORTSEARCH,[FlightSearchController::class,'getCountryAirports']);
Route::get(P::URL_COMPANIESSEARCH,[FlightSearchController::class,'getFlightCompanies']);
Route::get(P::URL_FLIGHTEVENTS,[FlightEventsController::class,'getAll']);
Route::get(P::URL_FLIGHTSEARCH,[FlightSearchController::class,'getCountires']);

Route::post(P::URL_FLIGHTPRICE,[FlightSearchController::class,'getFlightPrice'])->name(P::ROUTE_FLIGHTPRICE);

Route::resource(P::PREFIX_NEWS,PostController::class)->only([
    'index','show'
])->parameters([
    'news' => 'permalink'
]);

Route::view(P::URL_CONTACTS,P::VIEW_CONTACTS);
Route::view(P::URL_NEWS,P::VIEW_NEWS);
Route::view(P::URL_ROOT,P::VIEW_WELCOME);
Route::view(P::URL_WHOWEARE,P::VIEW_WHOWEARE);

Route::permanentRedirect(P::URL_HOME,P::URL_ROOT); 

//URL that not exists or the user is unauthorized to access
Route::fallback(function(){
    return view(P::VIEW_FALLBACK)->withErrors(['message' => C::ERR_URLNOTFOUND_NOTALLOWED]);
});
