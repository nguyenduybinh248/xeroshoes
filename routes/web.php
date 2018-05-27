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

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
	Route::get('/', 'HomeController@indextest');
	Route::post('/upload', 'HomeController@upload');
//	Route::post('/cart/{product}', 'CartController@cart');
	Route::resource('product','ProductController');
	Route::get('/show/{slug}', 'ProductController@show_product');
	Route::resource('stockin','StockInController');
	Route::resource('stockout','StockOutController');
	Route::get('import/{slug}','StockInController@show_import');
	Route::get('export/{slug}','StockOutController@show_export');
	Route::get('export_color/{slug}','StockOutController@get_color');
	Route::get('export_size','StockOutController@get_size');
	Route::get('export_max_qty/{id}','StockOutController@get_max');
	Route::post('/postimg','ProductController@postimg');
	Route::resource('category','CategoryController');
	Route::resource('sale','SaleController');
	Route::get('sale/edit/{sale}','SaleController@edit_products');
	Route::get('order','OrderController@index');
	Route::get('wait_order','OrderController@index_wait');
	Route::get('received_order','OrderController@index_receive');
	Route::get('cancel_order','OrderController@index_cancel');
	Route::get('order/{order}','OrderController@show');
	Route::put('order/cancel/{order}','OrderController@cancel');
	Route::put('order/confirm/{order}','OrderController@confirm');
	Route::get('sale-products/{sale}','SaleProductController@index');
	Route::get('sale-in_time','SaleProductController@in_time');
	Route::get('sale_price/{sale}','SaleProductController@get_sale_price');
	Route::put('edit/sale_price','SaleProductController@update');
	Route::put('remove/product','SaleProductController@remove');
	Route::delete('rate/{rate}', 'RateController@hide');
});


Route::get('/', 'ShopController@index');
Route::get('/product/view/{slug}', 'ShopController@view');
Route::get('/product/size/{size}', 'ShopController@getSize');
Route::get('/size/quantity/{id}', 'ShopController@quantity');
Route::post('/add/cart', 'CartController@add_cart');
Route::get('/cart', 'CartController@index');
Route::get('/cart/edit/{row}', 'CartController@edit_row');
Route::put('/cart/edit/{row}', 'CartController@update_row');
Route::get('/cart/size/edit/{row}', 'CartController@edit_size');
Route::get('/cart/size/{row}', 'CartController@quantity');
Route::delete('/cart/destroy', 'CartController@destroy');
Route::delete('/cart/destroy/{row}', 'CartController@row_destroy');
Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout', 'CheckoutController@store');
Route::get('/checkout/email', 'CheckoutController@info');
Route::get('product/{slug}', 'ShopController@index_detail');
Route::post('rate', 'RateController@create');
Route::put('rate', 'RateController@update');
Route::get('rate/{rate}', 'RateController@show');
Route::get('category/{category}', 'ListController@category');
Route::get('type/{type}', 'ListController@type');
Route::get('list/search', 'ListController@list_show');
Route::get('search', 'ListController@search');
Route::get('search/{search}', 'ListController@index_search');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
