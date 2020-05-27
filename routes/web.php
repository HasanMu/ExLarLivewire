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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::livewire('/shopping-cart', 'shopping-cart.home')->name('shoppingcart.home');
    Route::livewire('/products', 'shopping-cart.product-index')->name('shoppingcart.productindex');
    Route::livewire('/cart', 'shopping-cart.cart-index')->name('shoppingcart.cartindex');
});
