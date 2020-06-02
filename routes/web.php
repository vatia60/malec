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
Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'PageController@index')->name('pages.index');

    Route::get('/products', 'ProductController@index')->name('products.index');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {

    Route::get('/', 'PageController@index')->name('admin.index');

    Route::group(['prefix' => 'products'], function () {

    Route::get('/', 'ProductController@index')->name('admin.products.index');
    Route::get('/create', 'ProductController@create')->name('admin.products.create');
    Route::post('/create', 'ProductController@store')->name('admin.products.store');
    Route::get('/edit/{id}', 'ProductController@edit')->name('admin.products.edit');
    Route::post('/edit/{id}', 'ProductController@update')->name('admin.products.update');
    Route::post('/delete/{id}', 'ProductController@delete')->name('admin.products.delete');

});
});
