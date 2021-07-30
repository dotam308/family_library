<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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


Route::get('/books',[BookController::class, 'index'])->name('books');
Route::get('/addBook', [BookController::class, 'addBookForm'])->name('addBook');
Route::post('/addBook', [BookController::class, 'addBookPost']);
Route::get('/editBook', [BookController::class, 'editBookForm'])->name('editBook');
Route::post('/editBook', [BookController::class, 'editBookPost']);
Route::get('/confirmDeleteBook', [BookController::class, 'confirmDeleteBook'])->name('confirmDeleteBook');
// Route::delete('/deleteBook', [BookController::class, 'deleteBook'])->name('deleteBook');
Route::delete('/deleteBook/book/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');
Route::get('/deleteBook/book/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');

Route::get('contact',[HomeController::class, 'viewContact'])->name('contact');
Route::get('cart', [HomeController::class, 'viewCart'])->name('cart');
Route::get('/checkout',[HomeController::class, 'viewCheckout'])->name('checkout');

Route::get('/404', [HomeController::class, 'view404'])->name('404');
Route::get('/books_detail', [HomeController::class, 'viewBookDetailed'])->name('books_detail');

Route::get('/books_rented', [HomeController::class, 'viewBookRented'])->name('books_rented');
Route::get('/delete_rented/{id}', [HomeController::class, 'deleteBookRented'])->name('delete_rented');
Route::get('/rents_byId', [HomeController::class, 'viewManageBookRented'])->name('rents_byId');
Route::post('/rents_byId', [HomeController::class, 'manageBookRented']);
Route::get('/book_detail_byId', [HomeController::class, 'viewBookDetailById'])->name('book_detail_byId');
Route::post('/book_detail_byId', [HomeController::class, 'viewBookDetailByIdPost']);

Route::get('/borrowBook', [HomeController::class, 'borrowBookForm'])->name('borrowBook');
Route::post('/borrowBook', [HomeController::class, 'borrowBookPost']);

Route::get('/users',[UserController::class, 'index'])->name('users');
Route::get('/createuser',[UserController::class,'userAddForm'])->name('createuser');
Route::post('/createuser',[UserController::class,'addUser']);
Route::get('/edituser',[UserController::class,'userEditForm'])->name('edituser');
Route::post('/edituser',[UserController::class,'editUser']);
Route::get('/deleteuser/user/{id}',[UserController::class,'deleteUser'])->name('deleteuser');


Route::get('/manageBooks', [BookController::class, 'showBookList'])->name('manageBooks');

Route::get('/borrowedBooks', [BookController::class, 'showBorrowedBookList'])->name('borrowedBooks');
Route::get('/returnedBooks', [BookController::class, 'showReturnedBookList'])->name('returnedBooks');
Route::get('/cancelBorrow/{id}', [HomeController::class,'cancelBorrow']);

Route::get('/waitingOrders', [HomeController::class, 'waitingOrders'])->name('waitingOrders');
Route::get('/borrowingOrders', [HomeController::class, 'borrowingOrders'])->name('borrowingOrders');

Route::get('/tookBook', [HomeController::class, 'tookBook'])->name('tookBook');
Route::get('/returnBook', [HomeController::class, 'returnBook'])->name('returnBook');
