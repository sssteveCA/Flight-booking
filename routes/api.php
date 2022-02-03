<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function(){
    Route::post('/login',[LoginController::class, 'login'])->name('login');
    Route::post('/register',[RegisterController::class,'register'])->name('register');
});

Route::group(['prefix' => '/profile','middleware' => ['auth','verified']], function(){
    //Route of user personal area
    Route::name('api.')->group(function(){
        Route::patch('/editUsername',[InfoController::class,'editUsername'])->name('infocontroller.editusername');
        Route::patch('/editPassword',[InfoController::class,'editPassword'])->name('infocontroller.editpassword');
    });
});
