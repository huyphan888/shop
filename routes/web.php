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
 app('debugbar')->disable();
/* ================== admin area  ===================== */
Route::group(['prefix' => 'admin','middleware'=>'admin'], function () {
        Route::resource('users', 'AdminUsersController');
        Route::resource('medias', 'AdminMediasController');
        Route::resource('cates', 'AdminCatesController');
        Route::resource('products', 'AdminProductsController');
        Route::resource('orders', 'AdminOrdersController');
        Route::resource('comments', 'AdminCommentsController');
        Route::resource('replies', 'AdminRepliesController');
     Route::get('','AdminHomeController@index')->name('home');
    Route::delete('product/bulk', 'AdminProductsController@bulk')->name('products.bulk');
});




Route::group(['as'=>'frontend.'], function () {

    Route::get('/', 'FrontendHomeController@index')->name('home');

    Route::get('/{cate}/{slug}-{id}.html', 'FrontendHomeController@detail')
        ->name('detail')->where('slug','[\w-]+'); //trang chi tiet
    Route::get('{cate}.html', 'FrontendHomeController@cates')->name('cate'); //category

    Route::post('/{cate}/{slug}-{id}.html', 'FrontendHomeController@comment')
        ->name('comment')->where('slug','[\w-]+'); //comment

    Route::get('cart', 'FrontendCartController@index')->name('cart.index');
    Route::post('cart/delete', 'FrontendCartController@delete')->name('cart.delete');
    Route::get('cart/deleteAll', 'FrontendCartController@deleteAll')->name('cart.deleteAll');

    //checkout
    Route::get('checkout', 'FrontendCheckoutController@index')->name('checkout');
    Route::get('thankyou', 'FrontendCheckoutController@thankyou')->name('thankyou');
    Route::post('checkout', 'FrontendCheckoutController@checkout');

    Route::get('products', 'FrontendHomeController@products')->name('products');


});



Route::group(['as'=>'api.'], function () {
    Route::get('getCart', 'FrontendCartController@getCart')->name('cart.get');
    Route::post('cart', 'FrontendCartController@addToCart')->name('cart.add');
    Route::post('update', 'FrontendCartController@update')->name('cart.update');
});

Auth::routes();

Route::get('/home', 'FrontendHomeController@index')->name('home');
