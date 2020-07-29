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

Route::get('/', 'PageController@getHome');
Route::get('/getcategory-{category}','PageController@getCategory');
Route::get('/getprice-{price}','PageController@getPrice');
Route::get('/getcolor-{color}','PageController@getColor');
Route::get('/getram-{ram}','PageController@getRam');
Route::get('/getmemory-{memory}','PageController@getMemory');
Route::get('/detail-{id}','PageController@getDetail');
Route::post('/detail-{id}','PageController@postComment');
Route::get('/search','PageController@getSearch');
Route::get('/addcart-{id}','CartController@getAddCart');
Route::get('/cart','CartController@index');
Route::get('/removecart-{id}','CartController@remove');
Route::get('/updatecart','CartController@update');
Route::post('/cart','CartController@postComplete');


Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix'=>'login'],function(){
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');
});
    Route::get('logout','DashboardController@getLogout');
    Route::group(['prefix' => 'dashboard','middleware'=>'CheckLogedOut'], function () {
        Route::get('/','DashboardController@getDashboard',);
    });

    Route::get('/category', 'CategoryController@index')->name('category.index');
    Route::post('/category', 'CategoryController@store');
    Route::get('/category-{id}', 'CategoryController@edit');
    Route::post('/category-{id}', 'CategoryController@update');
    Route::get('/deletecate-{id}', 'CategoryController@delete');
    Route::get('/trashcate', 'CategoryController@trash')->name('cate.trash');
    Route::get('/restorecate-{id}', 'CategoryController@restore');
    Route::get('/destroycate-{id}', 'CategoryController@destroy');


    Route::get('/product', 'ProductController@index')->name('product.index');
    Route::get('/addproduct', 'ProductController@create');
    Route::post('/addproduct', 'ProductController@store');
    Route::get('/detailproduct-{id}','ProductController@show');
    Route::get('/editproduct-{id}', 'ProductController@edit');
    Route::post('/editproduct-{id}','ProductController@update');
    Route::get('/deleteproduct-{id}', 'ProductController@delete');
    Route::get('/trashproduct', 'ProductController@trash')->name('product.trash');
    Route::get('/restoreproduct-{id}', 'ProductController@restore');
    Route::get('/destroyproduct-{id}', 'ProductController@destroy');
});
