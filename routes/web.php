<?php

use App\Http\Controllers\bookflight\ResumeBookFlightController;
use App\Http\Controllers\bookhotel\ResumeBookHotelController;
use App\Http\Controllers\CarRentalController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\paypal\PaypalCarRentalController;
use App\Http\Controllers\paypal\PaypalController;
use App\Http\Controllers\paypal\PaypalFlightController;
use App\Http\Controllers\paypal\PaypalHotelController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\welcome\CarRentalSearchController;
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
use Illuminate\Support\Facades\Session;

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
    Route::resource(P::PREFIX_MYFLIGHTS, FlightController::class)->except([ 'edit','update', 'store' ]);
    Route::resource(P::PREFIX_MYHOTELS, HotelController::class)->except([ 'edit', 'update', 'store' ]);
    Route::resource(P::PREFIX_MYCARS, CarRentalController::class)->except([ 'edit', 'update', 'store']);
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
    Route::post('',[FlightController::class,'store'])->name(P::ROUTE_BOOKFLIGHT);
    Route::post(P::URL_FLIGHTRESUME,[ResumeBookFlightController::class,'resumeFlight'])->name(P::ROUTE_RESUMEFLIGHT);
    Route::post(P::URL_PAYPAL_RETURN,[PaypalFlightController::class,'return'])->name(P::ROUTE_FLIGHT_PAYPAL_RETURN);
    Route::get(P::URL_PAYPAL_CANCEL,[PaypalFlightController::class,'cancel'])->name(P::ROUTE_FLIGHT_PAYPAL_CANCEL);
});

Route::group(['prefix' => P::PREFIX_BOOKHOTEL, 'middleware' => ['auth','verified']], function(){
    Route::post('',[HotelController::class,'store'])->name(P::ROUTE_BOOKHOTEL);
    Route::post(P::URL_HOTELRESUME,[ResumeBookHotelController::class,'resumeHotel'])->name(P::ROUTE_RESUMEHOTEL);
    Route::post(P::URL_PAYPAL_RETURN, [PaypalHotelController::class, 'return'])->name(P::ROUTE_HOTEL_PAYPAL_RETURN);
    Route::get(P::URL_PAYPAL_CANCEL,[PaypalHotelController::class, 'cancel'])->name(P::ROUTE_HOTEL_PAYPAL_CANCEL);
});

Route::group(['prefix' => P::PREFIX_BOOKCARRENTAL, 'middleware' => ['auth','verified']], function(){
    Route::post('',[CarRentalController::class,'store'])->name(P::ROUTE_BOOKCARRENTAL);
    Route::post(P::URL_PAYPAL_RETURN,[PaypalCarRentalController::class,'return'])->name(P::ROUTE_CARRENTAL_PAYPAL_RETURN);
    Route::get(P::URL_PAYPAL_CANCEL,[PaypalCarRentalController::class,'cancel'])->name(P::ROUTE_CARRENTAL_PAYPAL_CANCEL);
});

Route::get(P::URL_HOME, [HomeController::class, 'index'])->name('home');
Route::post(P::URL_PREFERENCES_SET, [PreferenceController::class, 'cookieSet']);
Route::get(P::URL_AIRPORTS_AVAILABLE,[FlightSearchController::class,'getAvailableAirports']);
Route::get(P::URL_CARRENTALSEARCH,[CarRentalSearchController::class,'getCarRentalData']);
Route::get(P::URL_COMPANIESSEARCH,[FlightSearchController::class,'getFlightCompanies']);
Route::resource(P::PREFIX_FLIGHTEVENTS, FlightEventsController::class)->only(['index','show']);
Route::get(P::URL_HOTELS_AVAILABLE,[HotelSearchController::class,'getAvailableHotels']);

Route::post(P::URL_CARRENTALPRICE,[CarRentalSearchController::class,'getCarRentalPrice'])->name(P::ROUTE_CARRENTALPRICE);
Route::post(P::URL_FLIGHTEVENTBOOKPRICE,[FlightEventBookSearchController::class, 'getFlightEventBookPrice'])->name(P::ROUTE_FLIGHTEVENTBOOKPRICE);
Route::get(P::URL_FLIGHTPRICE,[FlightSearchController::class,'getFlightPrice_get'])->name(P::ROUTE_FLIGHTPRICE_GET);
Route::post(P::URL_FLIGHTPRICE,[FlightSearchController::class,'getFlightPrice'])->name(P::ROUTE_FLIGHTPRICE);
Route::get(P::URL_HOTELPRICE,[HotelSearchController::class, 'getHotelPrice_get'])->name(P::ROUTE_HOTELPRICE_GET);
Route::post(P::URL_HOTELPRICE, [HotelSearchController::class, 'getHotelPrice'])->name(P::ROUTE_HOTELPRICE);
Route::post(P::URL_SENDEMAIL,[EmailController::class,'sendEmail'])->name(P::ROUTE_SENDEMAIL);

Route::resource(P::PREFIX_NEWS,PostController::class)
    ->only(['index','show'])
    ->parameters(['news' => 'permalink']);

Route::view(P::URL_CONTACTS,P::VIEW_CONTACTS);
Route::view(P::URL_ROOT,P::VIEW_WELCOME);
Route::view(P::URL_ABOUTUS,P::VIEW_ABOUTUS);

Route::permanentRedirect(P::URL_HOME,P::URL_ROOT); 

Route::get(P::URL_COOKIE_POLICY,[PrivacyController::class,'getCookiePolicy']);
Route::get(P::URL_PRIVACY_POLICY,[PrivacyController::class,'getPrivacyPolicy']);
Route::get(P::URL_TERMS,[PrivacyController::class,'getTermsAndConditions']);

Route::get(P::URL_ERRORS, function(){
    if(session()->has('redirect') && session()->get('redirect') == '1'){
        session()->forget('redirect');
        return response()->view(P::VIEW_FALLBACK,[
            C::KEY_MESSAGES => [C::ERR_URLNOTFOUND_NOTALLOWED]
        ],400);
    }
    else{
        return redirect(P::URL_ROOT);
    }
});


//URL that not exists or the user is unauthorized to access
Route::fallback(function(){
    session()->put('redirect','1');
    return redirect(P::URL_ERRORS);
});
