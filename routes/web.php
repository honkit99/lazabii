<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductCategoryRelationController;
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
Route::get('login', 'App\Http\Controllers\User\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\User\Auth\LoginController@login');
Route::get('register', 'App\Http\Controllers\User\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\User\Auth\RegisterController@register');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('product', ProductController::class);
Route::resource('productCategory', ProductCategoryRelationController::class);
Route::resource('cart', CartController::class);
Route::post('addtocart/{id}', [App\Http\Controllers\CartController::class, 'addtocart'])->name('addtocart');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('addtowishlist/{id}', [App\Http\Controllers\User\FavouriteController::class, 'addtowishlist'])->name('addtowishlist');
//Route::resource('log', 'logController');