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

Route::group(['middleware' => ['guest']], function() {
    Route::post('/login', ['as' => 'login', 'uses' => 'UserController@login']);
    Route::post('/register', ['as' => 'register', 'uses' => 'UserController@store']);
    Route::get('/register/verify/{code}', ['as' => 'verifyaccount', 'uses' => 'UserController@verify']);
    Route::get('/login', ['as' => 'getlogin', 'uses' => 'UserController@getLogin']);
});

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::get('/best', ['as' => 'best', 'uses' => 'BestSellerController@index']);

Route::group(['middleware' => ['auth']], function() {
    Route::post('/usecoupon', ['as' => 'usecoupon', 'uses' => 'HomeController@useCoupon']);

    Route::post('/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);

    Route::get('/myprofile', ['as' => 'myprofile', 'uses' => 'UserController@show']);

    Route::post('/editprofile/{id}', ['as' => 'editprofile', 'uses' => 'UserController@edit']);

    Route::post('/changepassword/{id}', ['as' => 'changepassword', 'uses' => 'UserController@changepassword']);

    Route::post('/editaddress/{id}', ['as' => 'editaddress', 'uses' => 'UserController@editaddress']);

    Route::get('/getservice/{cour}/to/{dest}/{itemcount}', ['as' => 'getservice', 'uses' => 'HomeController@getService']);

    Route::get('/getcity/{id}', ['as' => 'getcity', 'uses' => 'HomeController@getCity']);

    Route::get('/user/transaction/detail/{id}', ['as' => 'gettransactiondetail', 'uses' => 'TransactionController@detail']);

    Route::post('/finalizeorder', ['as' => 'finalizeorder', 'uses' => 'HomeController@finalizeOrder']);

    Route::get('/browse', function () {
        return view('browse');
    });

    Route::get('/checkout', ['as' => 'checkout', 'uses' => 'HomeController@checkout'])->middleware('UserDataComplete');
});

Route::get('/makeyourown', ['as' => 'makeyourown', 'uses' => 'HomeController@makeyourown']);

Route::post('/addtocart', ['as' => 'addtocart', 'uses' => 'HomeController@addtocart']);

Route::get('/base/category/{catID}/size/{size}', ['as' => 'getBaseWithSize', 'uses' => 'HomeController@getBaseWithSize']);

Route::get('/base/{baseID}/strap/{strapID}/size/{size}', ['as' => 'getStock', 'uses' => 'HomeController@getStock']);

Route::get('/strap/category/{catID}/size/{size}', ['as' => 'getStrapWithSize', 'uses' => 'HomeController@getStrapWithSize']);

Route::post('/cart/remove/{id}', ['as' => 'removeCart', 'uses' => 'HomeController@removeCart']);

Route::get('/product', function () {
    return view('product');
});

Route::get('/teaser', function () {
    return view('teaser');
});

Route::get('/faq', ['uses' => 'FAQController@index']);
    
Route::group(['middleware' => ['admin']], function() {
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

        Route::group(['prefix' => 'price', 'as' => 'price'], function() {
            Route::post('/update', ['as' => 'update', 'uses' => 'PriceController@update']);
        });

        Route::group(['prefix' => 'slider', 'as' => 'slider'], function() {
            Route::post('/add', ['as' => 'add', 'uses' => 'SliderController@store']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'SliderController@update']);
            Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'SliderController@destroy']);
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
});