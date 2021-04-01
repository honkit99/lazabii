<?php

use App\User;
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
Route::get('login', 'App\Http\Controllers\User\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\User\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\User\Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'App\Http\Controllers\User\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\User\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'App\Http\Controllers\User\Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'App\Http\Controllers\User\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'App\Http\Controllers\User\Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'App\Http\Controllers\User\Auth\ResetPasswordController@reset');

Route::group(['middleware'=>['auth:user']], function () {
    Route::get('home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
   // Route::get('profile', [App\Http\Controllers\User\ProfileController::class, 'profile'])->name('profile');
        
    // Route::resource('product', 'User\ProductController');

    // Route::resource('voucher', 'User\VoucherController');

    // Route::resource('cart', 'User\CartController');

    // Route::resource('order', 'User\OrderController');

    // Route::resource('ewallet', 'User\EwalletController')->except('destroy');

    // Route::resource('address', 'User\AddressController');

    // Route::resource('favourite', 'User\FavouriteController');

    // Route::resource('feedback', 'User\FeedbackController');

    // Route::resource('category', 'User\CategoryController');

    // Route::resource('variance', 'User\VarianceController');

    // Route::resource('language', 'User\LanguageController');

    // Route::resource('payment', 'User\PaymentController');

    // Route::resource('refund', 'User\RefundController');
});
