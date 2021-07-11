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
    // return view('welcome');
    return view('index');
});
Route::get('/404', function() {
    //view(404)
    return view('404');

});
Route::get('/checkout', function() {
    //view(checkout)
    return view('checkout');
});
Route::get('/cart', function(){
    //view(cart)
    return view('cart');
});
Route::get('/signin', function() {
    //view(signin)
    return view('signin');
});
Route::get('/books_detail', function() {
    //view(book details)
    return view('books_detail');
});

Route::get('/books', function() {
    //view(book)
    return view('books');
});


