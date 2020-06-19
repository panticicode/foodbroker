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
Route::post('/cart/add/{id}', 'ShoppingController@cart_add')->name('cart.add');
Route::post('/cart/update', 'ShoppingController@cart_update')->name('cart.update');
Route::get('/cart/delete/{id}', 'ShoppingController@cart_delete')->name('cart.delete');