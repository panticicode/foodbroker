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
Route::get('/', 'FrontController@index');

Route::group(['namespace' => 'Front'], function(){
	Route::get('/product', 'ProductsController@index')->name('product');
	Route::get('/cart', 'ShoppingsController@cart')->name('cart');

	Route::post('/cart/add/{id}', 'ShoppingsController@cart_add')->name('cart.add');
	Route::post('/cart/create', 'OrdersController@cart_create')->name('cart.create');
	Route::get('/weight/increase/{id}', 'ShoppingsController@weight_increase')->name('weight.increase');
	Route::get('/weight/reduce/{id}', 'ShoppingsController@weight_reduce')->name('weight.reduce');
	Route::get('/quantity/increase/{id}/{qty}', 'ShoppingsController@quantity_increase')->name('quantity.increase');
	Route::get('/quantity/reduce/{id}/{qty}', 'ShoppingsController@quantity_reduce')->name('quantity.reduce');
	Route::get('/cart/delete/{id}', 'ShoppingsController@cart_delete')->name('cart.delete');
	Route::get('/order', 'OrdersController@index')->name('order');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/profile/update/{id}', 'HomeController@update')->name('profile.update');

