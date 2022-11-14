<?php

use App\Http\Controllers\bookflight\ResumeBookFlightController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\paypal\PaypalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\welcome\FlightEventsController;
use App\Http\Controllers\welcome\FlightSearchController;
use App\Http\Controllers\welcome\HotelSearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Paths as P;
use App\Interfaces\Constants as C;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
    Route::get(P::URL_INFO, [UserController::class, 'getData'])->name(P::ROUTE_INFO); 
    Route::resource(P::PREFIX_MYFLIGHTS, FlightController::class)->except([
        'edit','update'
    ]);
    Route::post(P::URL_FLIGHTRESUME,[ResumeBookFlightController::class,'resumeFlight'])->name(P::ROUTE_RESUMEFLIGHT);
    Route::patch(P::URL_EDITUSERNAME,[UserController::class,'editUsername'])->name(P::ROUTE_EDITUSERNAME);
    Route::patch(P::URL_EDITPASSWORD,[UserController::class,'editPassword'])->name(P::ROUTE_EDITPASSWORD);
    Route::delete(P::URL_DELETEACCOUNT,[UserController::class,'deleteAccountHard'])->name(P::ROUTE_DELETEACCOUNT);
});

Route::middleware('auth')->group(function(){
    Route::get(P::URL_EMAILVERIFY,function(){
        return view(P::VIEW_VERIFYEMAIL);
    })->name(P::ROUTE_VERIFICATIONNOTICE);
    Route::middleware('signed')->group(function(){
        Route::get(P::URL_EMAILVERIFY.'/{id}/{hash}', function(EmailVerificationRequest $request){
            $request->fulfill();
            return redirect(P::URL_ROOT);
        })->name(P::ROUTE_VERIFICATIONVERIFY);
    });
    Route::middleware(['throttle:6,1'])->group(function(){
        Route::post(P::URL_VERIFICATION_NOTIFICATION,function(Request $request){
            $request->user()->sendEmailVerificationNotification();
            return back()->with('message', C::OK_VERIFICATION_LINK_SENT);
        })->name(P::ROUTE_VERIFICATIONSEND);   
    });
});

Route::group(['prefix' => P::PREFIX_BOOKFLIGHT, 'middleware' => ['auth','verified']], function(){
    Route::post('',[FlightController::class,'store'])->name(P::ROUTE_BOOKFLIGHT)->middleware(['auth','verified']);
    Route::post(P::URL_BOOKFLIGHT_PAYPAL_RETURN,[PaypalController::class,'return'])->name(P::ROUTE_PAYPAL_RETURN);
    Route::get(P::URL_BOOKFLIGHT_PAYPAL_CANCEL,[PaypalController::class,'cancel'])->name(P::ROUTE_PAYPAL_CANCEL);
});

Route::get(P::URL_HOME, [HomeController::class, 'index'])->name('home');
Route::get(P::URL_AIRPORTS_AVAILABLE,[FlightSearchController::class,'getAvailableAirports']);
Route::get(P::URL_AIRPORTSEARCH,[FlightSearchController::class,'getCountryAirports']);
Route::get(P::URL_COMPANIESSEARCH,[FlightSearchController::class,'getFlightCompanies']);
Route::get(P::URL_FLIGHTEVENTS,[FlightEventsController::class,'getAll']);
Route::get(P::URL_FLIGHTSEARCH,[FlightSearchController::class,'getCountries']);
Route::get(P::URL_HOTELS_AVAILABLE,[HotelSearchController::class,'getAvailableHotels']);
Route::get(P::URL_HOTELCOUNTRIES,[HotelSearchController::class, 'getCountries']);
Route::get(P::URL_HOTELCITIES,[HotelSearchController::class,'getCities']);
Route::get(P::URL_HOTELSEARCH,[HotelSearchController::class,'getHotels']);
Route::get(P::URL_HOTELINFO,[HotelSearchController::class,'getHotelInfo']);

Route::get(P::URL_FLIGHTPRICE,[FlightSearchController::class,'getFlightPrice_get'])->name(P::ROUTE_FLIGHTPRICE_GET);
Route::post(P::URL_FLIGHTPRICE,[FlightSearchController::class,'getFlightPrice'])->name(P::ROUTE_FLIGHTPRICE);
Route::post(P::URL_HOTELPRICE, [HotelSearchController::class, 'getHotelPrice'])->name(P::ROUTE_HOTELPRICE);
Route::post(P::URL_SENDEMAIL,[EmailController::class,'sendEmail'])->name(P::ROUTE_SENDEMAIL);

Route::resource(P::PREFIX_NEWS,PostController::class)->only([
    'index','show'
])->parameters([
    'news' => 'permalink'
]);

Route::view(P::URL_CONTACTS,P::VIEW_CONTACTS);
Route::view(P::URL_ROOT,P::VIEW_WELCOME);
Route::view(P::URL_ABOUTUS,P::VIEW_ABOUTUS);

Route::permanentRedirect(P::URL_HOME,P::URL_ROOT); 

//URL that not exists or the user is unauthorized to access
Route::fallback(function(){
    return response()->view(P::VIEW_FALLBACK,
    [
        C::KEY_MESSAGES => [C::ERR_URLNOTFOUND_NOTALLOWED]
    ],400);
});
