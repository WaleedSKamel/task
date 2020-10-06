<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['namespace'=>'Item'],function (){

    Route::get('/', 'ItemController@all')->name('get.items');

    Route::post('/search', 'ItemController@search')->name('item.search');



});


Route::group(['namespace'=>'Cart'],function (){

    Route::get('get-cart', 'CartController@getCart')
        ->name('get.cart');

    Route::post('add-cart', 'CartController@addCart')
        ->name('add.cart');

    Route::post('remove-cart', 'CartController@removeCart')
        ->name('remove.cart');

    Route::get('store-order', 'CartController@storeOrder')
        ->name('store.order');

});
