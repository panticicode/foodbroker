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
	Route::get('/order/push', 'OrdersController@push')->name('order.push');
	Route::post('/order/store', 'OrdersController@order_store')->name('order.store');
	/**PUSH NOTIFICATION**/
	Route::get('/push','PushController@push')->name('push');
	Route::post('/push','PushController@store');
	// Route::get('/order/delete/cart', 'OrdersController@destroyCart')->name('destroy.cart');
});

Auth::routes();

Route::get('/profile', 'HomeController@index')->name('profile');
Route::post('/profile/update/{id}', 'HomeController@update')->name('profile.update');

Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function() {
	/**ADMIN ROUTES**/
	Route::resource('/', 'AdminController');
	Route::resource('/users', 'UsersController');
	Route::resource('/products', 'ProductsController');
	Route::get('orders/details/{order}', 'OrdersController@details')->name('details');
	Route::resource('/orders', 'OrdersController');
	Route::resource('/categories', 'CategoriesController');
	/**FOODBROKER ROUTES**/
	Route::get('foodbroker/products', 'FoodBrokerController@products')->name('products');
	Route::put('foodbroker/product/update/{id}', 'FoodBrokerController@productUpdate')->name('foodbroker.product.update');
	Route::get('foodbroker/product/stock/{id}', 'FoodBrokerController@stock')->name('foodbroker.product.stock');
	Route::get('foodbroker/orders', 'FoodBrokerController@orders')->name('orders');
	Route::get('foodbroker/orders/details/{order}', 'FoodBrokerController@details')->name('orders.details');
	Route::delete('foodbroker/orders/destroy/{order}', 'FoodBrokerController@destroy_order')->name('destroy_order');
	Route::resource('foodbroker', 'FoodBrokerController');
});