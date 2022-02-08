<?php

use App\Http\Controllers\api\ApiInfoController;
use App\Http\Controllers\api\Auth\ApiLoginController;
use App\Http\Controllers\api\Auth\LoginController;
use App\Http\Controllers\api\Auth\RegisterController;
use App\Http\Controllers\api\InfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user('api');
});

Route::group(['name' => 'api.'],function(){
    Route::post('/login',[ApiLoginController::class, 'login'])->name('login');
    Route::post('/register',[RegisterController::class,'register'])->name('register');
});

Route::group(['prefix' => '/profile','middleware' => 'auth:api'], function(){
    //Route of user personal area
    Route::name('api.')->group(function(){
        Route::get('/user',[ApiLoginController::class, 'getCurrentUser'])->name('apilogincontroller.user');
        Route::patch('/editUsername',[ApiInfoController::class,'editUsername'])->name('apiinfocontroller.editusername');
        Route::patch('/editPassword',[ApiInfoController::class,'editPassword'])->name('apiinfocontroller.editpassword');
    });
});
