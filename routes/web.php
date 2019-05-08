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

Route::get('/', 'FrontEndController@index')->name('FrontIndex');
Route::get('/products/{id}/{category}', 'FrontEndController@products')->name('FrontProducts');
Route::post('/products/{id}/{category}/sortBy', 'FrontEndController@sortProductsBy')->name('FrontSortProductsBy');
Route::get('/productDetail/{id}', 'FrontEndController@productDetail')->name('FrontProductDetail');

Route::post('addToCart', 'FrontEndController@addToCart')->name('addToCart');
Route::post('removeItemFromCart', 'FrontEndController@removeItemFromCart')->name('removeItemFromCart');

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

        /* ################## USERS ###################*/

        Route::prefix('users')->group(function () {
            Route::get('/', 'UserController@index')->name('users');
            Route::get('/addUser', 'UserController@create')->name('add_user');
            Route::post('/createUser', 'UserController@store')->name('create_user');
            Route::get('/editUser/{id}', 'UserController@edit')->name('edit_user');
            Route::put('/editUser/{id}/update', 'UserController@update')->name('update_user');
            Route::delete('/deleteUser/{id}', 'UserController@destroy')->name('delete_user');
        });

        /* ################## USERS ###################*/

        /* ################## ROLES ###################*/

        Route::prefix('roles')->group(function () {
            Route::get('/', 'RoleController@index')->name('roles');
            Route::post('/createRole', 'RoleController@store')->name('create_role');
            Route::get('/editRole/{id}', 'RoleController@edit')->name('edit_role');
            Route::put('/editRole/{id}/update', 'RoleController@update')->name('update_role');
            Route::delete('/deleteRole/{id}', 'RoleController@destroy')->name('delete_role');
        });

        /* ################## ROLES ###################*/

        /* ################## CATEGORIES ###################*/

        Route::prefix('categories')->group(function () {
            Route::get('/', 'CategoryController@index')->name('categories');
            Route::post('/createCategory', 'CategoryController@store')->name('create_category');
            Route::get('/editCategory/{id}', 'CategoryController@edit')->name('edit_category');
            Route::put('/editCategory/{id}/update', 'CategoryController@update')->name('update_category');
            Route::delete('/deleteCategory/{id}', 'CategoryController@destroy')->name('delete_category');
        });

        /* ################## CATEGORIES ###################*/

        /* ################## SUB CATEGORIES ###################*/

        Route::prefix('Subcategories')->group(function () {
            Route::get('/', 'SubCategoryController@index')->name('sub_categories');
            Route::post('/selectSub', 'SubCategoryController@selecte')->name('select_sub_category');
            Route::post('/createSubCategory', 'SubCategoryController@store')->name('create_sub_category');
            Route::get('/editSubCategory/{id}', 'SubCategoryController@edit')->name('edit_sub_category');
            Route::put('/editSubCategory/{id}/update', 'SubCategoryController@update')->name('update_sub_category');
            Route::delete('/deleteSubCategory/{id}', 'SubCategoryController@destroy')->name('delete_sub_category');
        });

        /* ################## SUB CATEGORIES ###################*/

        /* ################## PRODUCTS ###################*/

        Route::prefix('products')->group(function () {
            Route::get('/', 'ProductController@index')->name('products');
            Route::get('/addProduct', 'ProductController@create')->name('add_product');
            Route::post('/createProduct', 'ProductController@store')->name('create_product');
            Route::get('/editProduct/{id}', 'ProductController@edit')->name('edit_product');
            Route::put('/editProduct/{id}/update', 'ProductController@update')->name('update_product');
            Route::delete('/deleteProduct/{id}', 'ProductController@destroy')->name('delete_product');
        });

        /* ################## PRODUCTS ###################*/

    });
});
