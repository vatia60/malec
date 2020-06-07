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
  Route::get('/search', 'PageController@search')->name('pages.search');

  Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('products.index');
    Route::get('/show/{slug}', 'ProductController@show')->name('products.show');

    Route::get('/category/{id}', 'CategoryController@index')->name('products.categories.index');
  });

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

Route::group(['prefix' => 'categories'], function () {

    Route::get('/', 'CategoryController@index')->name('admin.categories.index');
    Route::get('/create', 'CategoryController@create')->name('admin.categories.create');
    Route::post('/create', 'CategoryController@store')->name('admin.categories.store');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit');
    Route::post('/edit/{id}', 'CategoryController@update')->name('admin.categories.update');
    Route::post('/delete/{id}', 'CategoryController@delete')->name('admin.categories.delete');

});

Route::group(['prefix' => 'brands'], function () {

    Route::get('/', 'BrandController@index')->name('admin.brands.index');
    Route::get('/create', 'BrandController@create')->name('admin.brands.create');
    Route::post('/create', 'BrandController@store')->name('admin.brands.store');
    Route::get('/edit/{id}', 'BrandController@edit')->name('admin.brands.edit');
    Route::post('/edit/{id}', 'BrandController@update')->name('admin.brands.update');
    Route::post('/delete/{id}', 'BrandController@delete')->name('admin.brands.delete');

});

Route::group(['prefix' => 'divisions'], function () {

    Route::get('/', 'DivisionController@index')->name('admin.divisions.index');
    Route::get('/create', 'DivisionController@create')->name('admin.divisions.create');
    Route::post('/create', 'DivisionController@store')->name('admin.divisions.store');
    Route::get('/edit/{id}', 'DivisionController@edit')->name('admin.divisions.edit');
    Route::post('/edit/{id}', 'DivisionController@update')->name('admin.divisions.update');
    Route::post('/delete/{id}', 'DivisionController@delete')->name('admin.divisions.delete');

});

Route::group(['prefix' => 'districts'], function () {

    Route::get('/', 'DistrictController@index')->name('admin.districts.index');
    Route::get('/create', 'DistrictController@create')->name('admin.districts.create');
    Route::post('/create', 'DistrictController@store')->name('admin.districts.store');
    Route::get('/edit/{id}', 'DistrictController@edit')->name('admin.districts.edit');
    Route::post('/edit/{id}', 'DistrictController@update')->name('admin.districts.update');
    Route::post('/delete/{id}', 'DistrictController@delete')->name('admin.districts.delete');

});

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
