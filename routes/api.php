<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::post('login', 'LoginUserController')
        ->name('auth.login');

    Route::middleware('auth:api')->group(function () {
    });
});

Route::get('initial-data', 'RoutesController')->name('initial.data');

Route::get('profile-types', 'GetAllProfileTypesController')->name('profile.types');
Route::get('document-types', 'GetAllDocumentTypesController')->name('documentType.get');
Route::get('cities', 'GetAllCitiesController')->name('cities.get');

Route::post('profiles', 'CreateProfileController')->name('profiles.save');
Route::get('profiles', 'GetProfilesController')->name('profiles.index');


