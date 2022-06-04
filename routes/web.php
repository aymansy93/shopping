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
// Route::get('/', function () {
//     return view('home');
// });
// Route::get('files/{file_name}', function($file_name = null)
// {
//     $path = storage_path().'/'.'app'.'/images/products'.$file_name;
//     if (file_exists($path)) {
//         return Response::download($path);
//     }
// });


// like route 

Route::get('like/{id}','App\Http\Controllers\likecontroller@like')->name('like');
Route::get('dislike/{id}','App\Http\Controllers\likecontroller@dis_like')->name('dislike');

// 

// route for admin controller 

Route::get('admin/user_order', "App\Http\Controllers\AdminController@orderuser")->name('admin.order');
Route::post('admin/changestatus/{id}', "App\Http\Controllers\AdminController@changestatus")->name('admin.changestatus');

Route::get('/admin/typeproduct', 'App\Http\Controllers\TypeProductController@create_type_product')->name('typeproduct');

Route::post('/admin/type-product', 'App\Http\Controllers\TypeProductController@store_create_type')->name('storetypeproduct');

Route::resource('/admin', AdminController::class);
// ===============================================================================
// route for cart & product & checkout
Route::get('profil/order','App\Http\Controllers\ProfilController@myorder')->name('myorder');

Route::get('profil','App\Http\Controllers\ProfilController@index')->name('profil');
Route::get('checkout','App\Http\Controllers\OrderController@checkout')->name('checkout');
Route::post('checkout','App\Http\Controllers\OrderController@checkout_store')->name('checkout.payment');



Route::get('add-to-cart/{id}', 'App\Http\Controllers\OrderController@addToCart')->name('add.to.cart');

Route::get('/cart', 'App\Http\Controllers\OrderController@index')->name('products.cart');
Route::get('/', 'App\Http\Controllers\ProductController@index')->name('products');
Route::get('/{id}', 'App\Http\Controllers\ProductController@show')->name('products.show');
Route::get('product/search','App\Http\Controllers\ProductController@search')->name('search');

// =======================================================================================================

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/test', function(){
//     $a = App\Models\User::where('ayman');
//     dd($a);
// });
