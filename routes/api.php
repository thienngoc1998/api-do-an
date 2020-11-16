<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'auth',
    ],
    function () {
        Route::post('login', [AuthController::class, 'login']);
//        Route::post('register', 'AuthController@register');
    }
);

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['prefix' => 'user'], function() {
       Route::get('/', [UserController::class, 'index']);
       Route::get('/{id}', [UserController::class, 'show']);
   });
});


