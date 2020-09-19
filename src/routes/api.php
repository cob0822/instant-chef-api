<?php

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

Route::middleware(['middleware' => 'guest:api'])->group(function () {
    Route::prefix('auth')->namespace('Auth')->group(function () {
        Route::post('login', 'login@Login');
    });
    Route::prefix('signup')->namespace('Signup')->group(function () {
        Route::post('/', 'Store');
    });
});

