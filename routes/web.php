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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-products/designs','HomeController@getProductDesigns')->name('product.designs');
Route::get('/products/{product}','HomeController@show_product');
Route::get('/products/{product}/order/{design}','HomeController@orderNow');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/create/categories','ProductCategoryController@create')->name('admin.create.category');
    Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/products','ProductsController@index')->name('admin.products');
    Route::get('/categories','ProductCategoryController@index')->name('admin.categories');
    Route::post('/categories','ProductCategoryController@store')->name('admin.category.store');
    Route::get('/create/products','ProductsController@create')->name('admin.create.product');
    Route::post('/products','ProductsController@store')->name('admin.product.store');
    Route::get('/products/{product}/designs','ProductsController@designs')->name('admin.product.designs');
    Route::get('/orders','ProductsController@index')->name('admin.orders');
    Route::get('/users','ProductsController@index')->name('admin.users');
    Route::get('/products/create/feature-combination','ProductsController@createFeatureCombination')->name('admin.create.feature-combination');
    Route::post('/products/feature-combination','ProductsController@storeFeatureCombination')->name('admin.feature-combination.store');
    Route::post('/products/{product}/design','ProductsController@storeProductDesign')->name('admin.design.store');
    Route::get('/products/{product}/edit','ProductsController@edit')->name('admin.product.edit');
    Route::post('/product/update','ProductsController@update')->name('admin.product.update');
});


Route::get('/get/products','ProductsController@getProducts')->name('get.products');
Route::get('/get/categories','ProductCategoryController@getCategories')->name('get.categories');