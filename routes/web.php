<?php

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

Auth::routes([
    'verify' => true
]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test', function () {
    \Illuminate\Support\Facades\Auth::logout();
});


Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::prefix('google')->group(function () {
        Route::get('', 'GoogleController@redirect')->name('google.auth');
        Route::get('callback', 'GoogleController@callback')->name('google.callback');
    });

});


Route::prefix('/profile')->namespace('Website')->middleware(['verified'])->group(function () {
    Route::namespace('Profile')->group(function () {
        Route::get('', 'ProfileController@index')->name('profile.index');
        Route::prefix('twofactorauth')->group(function () {
            Route::get('', 'TwoFactorAuthController@showManagmentTwoFactorView')->name('management.2fa.view');
            Route::post('', 'TwoFactorAuthController@PostManagmentTwoFactorView')->name('management.2fa');
            Route::get('/code', 'TwoFactorAuthController@getViewVerifyCode')->name('management.2fa.view.code');
            Route::post('/code', 'TwoFactorAuthController@postVerifyCode')->name('management.2fa.code');
        });
    });

});
