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

// 認証せずに使用できるAPI
Route::middleware('api')->group(function () {
    Route::prefix('orders')->namespace('Order')->group(function () {
        Route::prefix('categories')->namespace('Category')->group(function () {
            Route::get('/', 'Index');
        });
    });
});

// 認証後に使用できるAPI
Route::middleware('auth:api')->group(function () {
    //
});
