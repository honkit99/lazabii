<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProductCategoryRelationController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\FavouriteController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController;

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

// Add to cart Routes..

// Route::get('profile', [App\Http\Controllers\User\ProfileController::class, 'profile'])->name('profile');

Route::group(['middleware'=>['auth:user']], function () {
   
    Route::get('home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
    Route::resource('profile', ProfileController::class);
    
    Route::resource('category', CartController::class);
    Route::post('addtocart/{id}', [App\Http\Controllers\User\CartController::class, 'addtocart'])->name('addtocart');
    Route::post('cartadded/{id}/{favourite}', [App\Http\Controllers\User\CartController::class, 'cartadded'])->name('cartadded');
    Route::patch('updatecart/{cart}', [App\Http\Controllers\User\CartController::class, 'updatecart'])->name('updatecart');
    Route::post('addtowishlist/{id}', [App\Http\Controllers\User\FavouriteController::class, 'addtowishlist'])->name('addtowishlist');
    Route::resource('product', ProductController::class);

    // Route::resource('voucher', 'User\VoucherController');
    
    Route::resource('productCategory', ProductCategoryRelationController::class);

    Route::resource('cart', CartController::class);
    Route::resource('order', OrderController::class);
    
    // Route::resource('ewallet', 'User\EwalletController')->except('destroy');

    // Route::resource('address', 'User\AddressController');

    Route::resource('favourite', FavouriteController::class);

    // Route::resource('feedback', 'User\FeedbackController');


    // Route::resource('variance', 'User\VarianceController');

    // Route::resource('language', 'User\LanguageController');

    // Route::resource('payment', 'User\PaymentController');

    // Route::resource('refund', 'User\RefundController');
});
