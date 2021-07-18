<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
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

Route::get('/',[HomeController::class, 'index'])->name('index');
Route::get('/signin', [RegisteredUserController::class, "create"])->name('signin');
Route::post('/signin', [RegisteredUserController::class, "store"]);
Route::get('/logout', [AuthenticatedSessionController::class, "destroy"])->name('logout');


Route::get('/books',[HomeController::class, 'viewBooks'])->name('books');
Route::get('contact',[HomeController::class, 'viewContact'])->name('contact');
Route::get('cart', [HomeController::class, 'viewCart'])->name('cart');
Route::get('/checkout',[HomeController::class, 'viewCheckout'])->name('checkout');

Route::get('/404', [HomeController::class, 'view404'])->name('404');
Route::get('/books_detail', [HomeController:: class, 'viewBookDetailed'])->name('books_detail');

