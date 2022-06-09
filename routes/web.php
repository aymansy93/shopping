<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
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
Auth::routes();


Route::post('/{id}/comment', 'App\Http\Controllers\ProductController@commentadd')->name('comment')->middleware('auth','checknewuser');

// like route 

Route::get('like/{id}','App\Http\Controllers\ProductController@like')->name('like')->middleware('auth','checknewuser');
Route::get('dislike/{id}','App\Http\Controllers\ProductController@dis_like')->name('dislike')->middleware('auth','checknewuser');
// 

// route for admin controller 

Route::get('admin/user_order', "App\Http\Controllers\AdminController@orderuser")->name('admin.order')->middleware('checknewuser');
Route::post('admin/changestatus/{id}', "App\Http\Controllers\AdminController@changestatus")->name('admin.changestatus')->middleware('checknewuser');

Route::get('/admin/typeproduct', 'App\Http\Controllers\TypeProductController@create_type_product')->name('typeproduct')->middleware('checknewuser');

Route::post('/admin/type-product', 'App\Http\Controllers\TypeProductController@store_create_type')->name('storetypeproduct')->middleware('checknewuser');

Route::resource('/admin', AdminController::class)->middleware('checknewuser');
// ===============================================================================
// route for cart & product & checkout
Route::get('profil/addnew','App\Http\Controllers\ProfilController@new')->name('new.profil');
Route::post('profil/addnew','App\Http\Controllers\ProfilController@new_store')->name('new.store.profil');

Route::put('profil/setting','App\Http\Controllers\ProfilController@update')->name('update.profil')->middleware('checknewuser');

Route::get('profil/setting','App\Http\Controllers\ProfilController@setting')->name('setting')->middleware('checknewuser');

Route::get('profil/order','App\Http\Controllers\ProfilController@myorder')->name('myorder')->middleware('checknewuser');
Route::delete('profil/{id}/order/','App\Http\Controllers\ProfilController@destroy')->name('order.delete')->middleware('checknewuser');

Route::get('profil','App\Http\Controllers\ProfilController@index')->name('profil')->middleware('checknewuser');
Route::get('checkout','App\Http\Controllers\OrderController@checkout')->name('checkout');
Route::post('checkout','App\Http\Controllers\OrderController@checkout_store')->name('checkout.payment');



Route::get('add-to-cart/{id}', 'App\Http\Controllers\OrderController@addToCart')->name('add.to.cart');

Route::get('/cart', 'App\Http\Controllers\OrderController@index')->name('products.cart');
Route::get('/', 'App\Http\Controllers\ProductController@index')->name('products');
Route::get('/{id}', 'App\Http\Controllers\ProductController@show')->name('products.show');
Route::get('product/search','App\Http\Controllers\ProductController@search')->name('search');

// =======================================================================================================

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

