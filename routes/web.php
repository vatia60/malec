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

    Route::group(['prefix' => 'products'], function () {

    Route::get('/', 'AdminProductController@index')->name('admin.products.index');
    Route::get('/create', 'AdminProductController@create')->name('admin.products.create');
    Route::post('/create', 'AdminProductController@store')->name('admin.products.store');
    Route::get('/edit/{id}', 'AdminProductController@edit')->name('admin.products.edit');
    Route::post('/edit/{id}', 'AdminProductController@update')->name('admin.products.update');
    Route::post('/delete/{id}', 'AdminProductController@delete')->name('admin.products.delete');

});
});
