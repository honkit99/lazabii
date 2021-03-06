<?php

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use ConsoleTVs\Charts\ChartsController;

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

    Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    Route::resource('profile', App\Http\Controllers\Admin\ProfileController::class);
    
    //Route::resource('products', 'App\Http\Controllers\Admin\ProductController');

    Route::resource('adminlist', 'App\Http\Controllers\Admin\AdminController');
    
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::post('productimage', [App\Http\Controllers\Admin\ProductController::class,'addImages'])->name('productimage');
    Route::resource('admins', 'App\Http\Controllers\Admin\AdminController');

    Route::resource('users', 'App\Http\Controllers\User\UserController');

    Route::resource('productCategory', 'App\Http\Controllers\Admin\ProductCategoryRelationController');


    // Route::resource('voucher', 'Admin\VoucherController');

    Route::resource('order', App\Http\Controllers\Admin\OrderController::class);

    Route::resource('categorys', 'App\Http\Controllers\Admin\CategoryController');

    // Route::resource('variance', 'Admin\VarianceController');

     //Route::resource('productimages', 'App\Http\Controllers\Admin\ProductImageController');

    // Route::resource('delivery-company', 'Admin\DeliveryCompanyController');

    // Route::resource('notification', 'Admin\NotificationController');

    // Route::resource('language', 'Admin\LanguageController');

    // Route::resource('refund', 'Admin\RefundController');
});




