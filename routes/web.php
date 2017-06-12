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

	Route::group(['prefix' => 'transaction', 'as' => 'transaction'], function() {
		Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'TransactionController@destroy']);
		Route::post('/update/{id}', ['as' => 'update', 'uses' => 'TransactionController@update']);
        Route::get('/detail/{id}', ['as' => 'detail', 'uses' => 'TransactionController@detail']);
        Route::post('/changestatus/{id}', ['as' => 'changestatus', 'uses' => 'TransactionController@changestatus']);
	});

	Route::group(['prefix' => 'category', 'as' => 'category'], function() {
		Route::post('/changestatus/{id}', ['as' => 'changestatus', 'uses' => 'CategoryController@changeStatus']);
		Route::get('/{id}', ['as' => 'show', 'uses' => 'CategoryController@show']);
        Route::post('/update/{id}', ['as' => 'update', 'uses' => 'CategoryController@update']);
        Route::post('/togglestatus/{id}', ['as' => 'togglestatus', 'uses' => 'CategoryController@toggleStatus']);
	});

	Route::group(['prefix' => 'product', 'as' => 'product'], function() {
        Route::group(['prefix' => 'base', 'as' => 'base'], function(){
           Route::post('/add', ['as' => 'add', 'uses' => 'BaseController@store']);
           Route::get('/{id}', ['as' => 'show', 'uses' => 'BaseController@detail']);
           Route::post('/update/{id}', ['as' => 'update', 'uses' => 'BaseController@update']);
           Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'BaseController@destroy']);
        });
        Route::group(['prefix' => 'strap', 'as' => 'strap'], function(){
           Route::post('/add', ['as' => 'add', 'uses' => 'StrapController@store']);
           Route::get('/{id}', ['as' => 'update', 'uses' => 'StrapController@detail']);
           Route::post('/update/{id}', ['as' => 'update', 'uses' => 'StrapController@update']);
           Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'StrapController@destroy']);
        });
        Route::group(['prefix' => 'tattoo', 'as' => 'tattoo'], function(){
           Route::post('/add', ['as' => 'add', 'uses' => 'TattooController@store']);
           Route::get('/{id}', ['as' => 'update', 'uses' => 'TattooController@detail']);
           Route::post('/update/{id}', ['as' => 'update', 'uses' => 'TattooController@update']);
           Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'TattooController@destroy']);
        });
	});

	Route::group(['prefix' => 'coupon', 'as' => 'coupon'], function() {
		Route::post('/add', ['as' => 'add', 'uses' => 'CouponController@store']);
        Route::get('/{id}', ['as' => 'show', 'uses' => 'CouponController@show']);
		Route::post('/update/{id}', ['as' => 'update', 'uses' => 'CouponController@update']);
		Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'CouponController@destroy']);
	});

	Route::group(['prefix' => 'ffotm', 'as' => 'ffotm'], function() {
		Route::post('/update/{id}', ['as' => 'update', 'uses' => 'FFoTMController@update']);
	});

	Route::group(['prefix' => 'faq', 'as' => 'faq'], function() {
		Route::post('/update', ['as' => 'update', 'uses' => 'FAQController@update']);
	});

	Route::group(['prefix' => 'webdetail', 'as' => 'webdetail'], function() {
		Route::post('/update', ['as' => 'update', 'uses' => 'WebDetailController@update']);
	});



});