<?php

use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
