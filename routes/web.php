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

Route::get('/', 'PageController@index')->name('pages.index');

Route::get('/products', 'ProductController@index')->name('products.index');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', 'AdminPageController@index')->name('admin.index');

    Route::get('/products', 'AdminPageController@products_index')->name('admin.products.index');
    Route::get('/products/create', 'AdminPageController@products_create')->name('admin.products.create');
    Route::post('/products/create', 'AdminPageController@products_store')->name('admin.products.store');

});
