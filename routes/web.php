<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Paths as P;
use App\Interfaces\Constants as C;

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

Route::get('/', function () {
    return view('welcome');
});

//Private profile routes
Route::group(['prefix' => 'profile', 'middleware' => ['auth','verified']], function(){
    Route::get('/info', [InfoController::class, 'getData'])->name('infocontroller.info'); 
    Route::get('/myFlights',function(){
    });  
    Route::patch('/editUsername',[InfoController::class,'editUsername'])->name('infocontroller.editusername');
    Route::patch('/editPassword',[InfoController::class,'editPassword'])->name('infocontroller.editpassword');
});

Auth::routes(['verify' => true]);

Route::get(P::URL_HOME, [HomeController::class, 'index'])->name('home');

Route::view(P::URL_HOME,P::URL_HOME);
Route::view(P::URL_NEWS,P::VIEW_NEWS);
Route::view(P::URL_ROOT,P::VIEW_WELCOME);
Route::view(P::URL_WHOWEARE,P::VIEW_WHOWEARE);


//URL that not exists
Route::fallback(function(){
    return view('error/errors')->withErrors(['message' => C::ERR_URLNOTFOUND]);
});
