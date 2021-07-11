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
});
Route::get('/books_media-grid-view-v2', function() {
    return view('books_media-grid-view-v2');
});
Route::get('/books_media-grid-view-v2', function() {
    return view('books_media-grid-view-v2');
})->name('books_media-grid-view-v2');