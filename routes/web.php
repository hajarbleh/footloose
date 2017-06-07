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

Route::get('/', function () {
    return view('index');
});

Route::get('/browse', function () {
    return view('browse');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/makeyourown', function () {
    return view('makeyourown');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/teaser', function () {
    return view('teaser');
});

Route::get('/user', function () {
    return view('user');
});

Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
	Route::get('/', ['as' => 'index' , 'uses' => 'AdminController@index']);

	Route::group(['prefix' => 'transactionstatus', 'as' => 'transaction'], function() {
		Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'TransactionController@delete']);
		Route::post('/update/{id}', ['as' => 'update', 'uses' => 'TransactionController@update']);
	});

	Route::group(['prefix' => 'category', 'as' => 'category'], function() {
		Route::post('/changestatus/{id}', ['as' => 'changestatus', 'uses' => 'CategoryController@changeStatus']);
		Route::post('/update/{id}', ['as' => 'update', 'uses' => 'CategoryController@update']);
	});

	Route::group(['prefix' => 'product', 'as' => 'product'], function() {
		Route::post('/add', ['as' => 'add', 'uses' => 'ProductController@store']);
		Route::post('/update/{id}', ['as' => 'update', 'uses' => 'ProductController@update']);
		Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'ProductController@delete']);
	});

	Route::group(['prefix' => 'coupon', 'as' => 'coupon'], function() {
		Route::post('/add', ['as' => 'add', 'uses' => 'CouponController@store']);
		Route::post('/update/{id}', ['as' => 'update', 'uses' => 'CouponController@update']);
		Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'CouponController@delete']);
	});

	Route::group(['prefix' => 'ffotm', 'as' => 'ffotm'], function() {
		Route::post('/update', ['as' => 'update', 'uses' => 'FFoTMController@update']);
	});

	Route::group(['prefix' => 'faq', 'as' => 'faq'], function() {
		Route::post('/update', ['as' => 'update', 'uses' => 'FAQController@update']);
	});

	Route::group(['prefix' => 'webdetail', 'as' => 'webdetail'], function() {
		Route::post('/update', ['as' => 'update', 'uses' => 'WebDetailController@update']);
	});

});