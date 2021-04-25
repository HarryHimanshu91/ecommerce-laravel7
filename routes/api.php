<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('all_products', 'API\ProductController@getAllProducts');
Route::get('product_detail/{id}', 'API\ProductController@getProductDetail');
Route::get('categories', 'API\ProductController@getAllCategories');
Route::get('category/{id}', 'API\ProductController@getCategoryProduct');



Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\UserController@details');
    Route::get('logout', 'API\UserController@logout');
    Route::post('addToCart', 'API\ProductController@addToCart');
    Route::get('getUserCart', 'API\ProductController@getUserCartDetails');
});
