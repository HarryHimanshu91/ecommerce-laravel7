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

Route::get('/login', function () {
    return view('login');
});

Route::post('/login','UserController@login')->name('login');
Route::get('/register','UserController@register')->name('register');
Route::post('/saveUser','UserController@SaveUser')->name('saveUser');

Route::get('/','ProductController@index')->name('home');
Route::get('detail/{id}','ProductController@details')->name('detail');
Route::get('search','ProductController@search')->name('search');
Route::post('add_to_cart','ProductController@add_to_cart')->name('add_to_cart');

Route::get('cart_list','ProductController@totalCartList')->name('cart_list');
Route::get('cart_remove/{id}','ProductController@removeCart')->name('cart_remove');
Route::get('order_now','ProductController@OrderNow')->name('order_now');
Route::post('order_place','ProductController@placeOrder')->name('placeOrder');
Route::get('myOrder','ProductController@UserOrder')->name('userOrder');

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
