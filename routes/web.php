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
//     return view('shop');
// });

Route::get('/', 'ShopController@index');

Auth::routes();

Route::resource('home', 'HomeController');

Route::get('profile', 'ProfileController@index')->name('profile');

Route::get('admin', 'AdminController@index')->name('admin');

Route::get('admin/products', 'AdminController@products');
Route::get('admin/suppliers', 'AdminController@suppliers');
Route::get('admin/categories', 'AdminController@categories');


Route::resource('shop', 'ShopController');

Route::resource('supplier', 'SupplierController');

Route::resource('products', 'ProductController');

Route::resource('category', 'CategoryController');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::get('/search','ShopController@search');


Route::get('addtocart/{id}', [
    'as' => 'addtocart',
    'uses' => 'HomeController@AddToCart'
]);

Route::post('updatecart', [
    'as' => 'updatecart',
    'uses' => 'HomeController@updateCart'
]);

Route::get('products/{id}/destroy/', [
    'as' => 'products_destroy',
    'uses' => 'ProductController@destroy'
]);

Route::get('categories/{id}/destroy/', [
    'as' => 'categories_destroy',
    'uses' => 'CategoryController@destroy'
]);

Route::get('supplier/{id}/destroy/', [
    'as' => 'suppier_destroy',
    'uses' => 'SupplierController@destroy'
]);

Route::get('users/{id}/destroy/', [
    'as' => 'users_destroy',
    'uses' => 'RoleController@destroy'
]);

Route::get('permissions/{id}/destroy/', [
    'as' => 'permissions_destroy',
    'uses' => 'PermissionController@destroy'
]);

Route::get('roles/{id}/destroy/', [
    'as' => 'role_destroy',
    'uses' => 'RoleController@destroy'
]);
