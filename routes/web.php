<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

/**Route TO Front VIEW**/
Route::get('/', 'HomeController@index');

Route::get('/product', 'ShoppingController@product')->name('product');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/order', 'ShoppingController@order')->name('order');
Route::post('/cart/add/{id}', 'ShoppingController@cart_add')->name('cart.add');
Route::post('/cart/create', 'ShoppingController@cart_create')->name('cart.create');
Route::get('/weight/increase/{id}', 'ShoppingController@weight_increase')->name('weight.increase');
Route::get('/weight/reduce/{id}', 'ShoppingController@weight_reduce')->name('weight.reduce');
Route::get('/quantity/increase/{id}/{qty}', 'ShoppingController@quantity_increase')->name('quantity.increase');
Route::get('/quantity/reduce/{id}/{qty}', 'ShoppingController@quantity_reduce')->name('quantity.reduce');
Route::get('/cart/delete/{id}', 'ShoppingController@cart_delete')->name('cart.delete');