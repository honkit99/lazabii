<?php

use App\Admin;
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
// Authentication Routes...
Route::get('login', 'App\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Admin\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Admin\Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'App\Http\Controllers\Admin\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Admin\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'App\Http\Controllers\Admin\Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'App\Http\Controllers\Admin\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'App\Http\Controllers\Admin\Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'App\Http\Controllers\Admin\Auth\ResetPasswordController@reset');

Route::group(['middleware'=>['auth:admin']], function () {
    Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');
    Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'profile'])->name('profile');
});
