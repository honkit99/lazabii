<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('product', 'Admin\ProductController');

Route::resource('voucher', 'Admin\VoucherController');

Route::resource('order', 'Admin\OrderController');

Route::resource('category', 'Admin\CategoryController');

Route::resource('variance', 'Admin\VarianceController');

Route::resource('product-image', 'Admin\ProductImageController');

Route::resource('delivery-company', 'Admin\DeliveryCompanyController');

Route::resource('notification', 'Admin\NotificationController');

Route::resource('language', 'Admin\LanguageController');

Route::resource('refund', 'Admin\RefundController');

Route::resource('log', 'logController');

Route::resource('user', 'User\UserController');

Route::resource('product', 'User\ProductController');

Route::resource('voucher', 'User\VoucherController');

Route::resource('cart', 'User\CartController');

Route::resource('order', 'User\OrderController');

Route::resource('ewallet', 'User\EwalletController')->except('destroy');

Route::resource('address', 'User\AddressController');

Route::resource('favourite', 'User\FavouriteController');

Route::resource('feedback', 'User\FeedbackController');

Route::resource('category', 'User\CategoryController');

Route::resource('variance', 'User\VarianceController');

Route::resource('language', 'User\LanguageController');

Route::resource('payment', 'User\PaymentController');

Route::resource('refund', 'User\RefundController');
