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
})->name('index');
Route::get('/404', function() {
    return view('404');
})->name('404');
Route::get('contact', function() {
    return view('contact');
})->name('contact');
Route::get('cart', function() {
    return view('cart');
})->name('cart');
Route::get('/checkout', function() {
    //view(checkout)
    return view('checkout');
})->name('checkout');
Route::get('/signin', function() {
    //view(signin)
    return view('signin');
})->name('signin');
Route::get('/books_detail', function() {
    //view(book details)
    return view('books_detail');
})->name('books_detail');

Route::get('/books', function() {
    //view(book)
    return view('books');
})->name('books');

Route::get('/symlink', function () {
    Artisan::call('storage:link');
});
Route::get('abc', function() {
    return view('test');
});