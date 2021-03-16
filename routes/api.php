<?php

use Illuminate\Support\Facades\Route;

Route::group(['domain' => env('APP_URL')], function () {

    Route::prefix('auth')->namespace('Auth')->group(function () {
        Route::post('register', 'RegisterUserController')
            ->name('auth.register');
        Route::post('login', 'LoginUserController')
            ->name('auth.login');

        Route::middleware('auth:api')->group(function () {
        });
    });
    Route::get('initial-data', 'RoutesController')->name('initial.data');
});

