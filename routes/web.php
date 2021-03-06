<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\StatisticController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/signin', [RegisteredUserController::class, "create"])->name('signin');
Route::post('/signin', [RegisteredUserController::class, "store"]);
Route::get('/logout', [AuthenticatedSessionController::class, "destroy"])->name('logout');


Route::get('/books', [BookController::class, 'index'])->name('books');

Route::get('contact', [HomeController::class, 'viewContact'])->name('contact');
// Route::get('cart', [HomeController::class, 'viewCart'])->name('cart');
// Route::get('/checkout', [HomeController::class, 'viewCheckout'])->name('checkout');

Route::get('/404', [HomeController::class, 'view404'])->name('404');
Route::get('/books_detail', [HomeController::class, 'viewBookDetailed'])->name('books_detail');

Route::get('/book_detail_byId', [HomeController::class, 'viewBookDetailById'])->name('book_detail_byId');
Route::post('/book_detail_byId', [HomeController::class, 'viewBookDetailByIdPost']);

Route::get('/borrowBook', [HomeController::class, 'borrowBookForm'])->name('borrowBook');
Route::post('/borrowBook', [HomeController::class, 'borrowBookPost']);


//Route::get('/profile',[UserController::class,'userInfo'])->name('profile');

Route::get('/search_books', [SearchController::class, 'bookSearch'])->name('bookSearch');
Route::get('/search_books_admin', [SearchController::class, 'bookManagementSearch'])->name('bookManagementSearch');
Route::get('/search_books_borrowed', [SearchController::class, 'bookBorrowSearch'])->name('bookBorrowSearch');
Route::get('/search_users', [SearchController::class, 'userSearch'])->name('userSearch');
Route::get('/search_fav', [SearchController::class, 'bookFavSearch'])->name('bookFavSearch');

// Route::get('/bookSearch', [SearchController::class, 'bookSearch'])->name('booksearch');
// Route::get('/bookManageSearch', [SearchController::class, 'bookManageSearch'])->name('bookmanagesearch');
// Route::get('/userSearch', [SearchController::class, 'userSearch'])->name('usersearch');




Route::middleware(['auth'])->group(function () {

    Route::middleware('admin')->group(function() {
        Route::get('/addBook', [BookController::class, 'addBookForm'])->name('addBook');
        Route::post('/addBook2', [BookController::class, 'addBooklevel2'])->name('addBooklevel2');
        Route::post('/addBook', [BookController::class, 'addBookPost']);
        Route::get('/editBook', [BookController::class, 'editBookForm'])->name('editBook');
        Route::post('/editBook', [BookController::class, 'editBookPost']);
        Route::get('/confirmDeleteBook', [BookController::class, 'confirmDeleteBook'])->name('confirmDeleteBook');
        // Route::delete('/deleteBook', [BookController::class, 'deleteBook'])->name('deleteBook');
        Route::delete('/deleteBook/book/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');
        Route::get('/deleteBook/book/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');
        Route::get('/books_rented', [HomeController::class, 'viewBookRented'])->name('books_rented');
        Route::get('/delete_rented/{id}', [HomeController::class, 'deleteBookRented'])->name('delete_rented');
        Route::get('/rents_byId', [HomeController::class, 'viewManageBookRented'])->name('rents_byId');
        Route::post('/rents_byId', [HomeController::class, 'manageBookRented']);
    
        Route::get('/users', [UserController::class, 'index'])->name('users');
    
        Route::get('/create_user', [UserController::class, 'userAddForm'])->name('createUser');
        Route::post('/create_user', [UserController::class, 'addUser']);
        Route::get('/edit_user', [UserController::class, 'userEditForm'])->name('editUser');
        Route::post('/edit_user', [UserController::class, 'editUser']);
        Route::get('/delete_user/user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('/manageBooks', [BookController::class, 'showBookList'])->name('manageBooks');

        
        Route::get('/cancelBorrow/{id}', [HomeController::class, 'cancelBorrow']);   
        Route::get('/waitingOrders', [HomeController::class, 'waitingOrders'])->name('waitingOrders');
        Route::get('/borrowingOrders', [HomeController::class, 'borrowingOrders'])->name('borrowingOrders');
        Route::get('/returnedOrders', [HomeController::class, 'returnedOrders'])->name('returnedOrders');
    
        Route::get('/tookBook', [HomeController::class, 'tookBook'])->name('tookBook');
        Route::get('/returnBook', [HomeController::class, 'returnBook'])->name('returnBook');
    
        Route::post('/saveFavorite', [WishListController::class, 'saveFavorite'])->name('saveFavorite');
        Route::get('/deleteFavoriteBookList/{id}', [WishListController::class, 'deleteFavoriteBookList'])->name('deleteFavoriteBookList');

        Route::get('/add_borrowing/borrower', [BookController::class, 'checkBorrower'])->name("checkBorrower");
        Route::post('/add_borrowing/borrower', [BookController::class, 'checkBorrowerPost'])->name("checkBorrowerUsername");
        Route::get('add_borrowing', [BookController::class, 'addBorrowing'])->name('addBorrowing');
        Route::post('add_borrowing', [BookController::class, 'addBorrowingPost'])->name('addBorrowingPost');
        Route::post('/add_borrowings', [SearchController::class, 'searchBookWhenAddBorrowing'])->name('searchWhenAddBorrowing');
    
        Route::get('/statisticBook', [StatisticController::class, 'viewBook'])->name('statisticBook');
        Route::get('/statisticUser', [StatisticController::class, 'viewUser'])->name('statisticUser');
        Route::get('/statisticRent', [StatisticController::class, 'viewRent'])->name('statisticRent');
    });
    

    Route::get('/borrowedBooks', [BookController::class, 'showBorrowedBookList'])->name('borrowedBooks');
    Route::get('/returnedBooks', [BookController::class, 'showReturnedBookList'])->name('returnedBooks');

    Route::get('/favoriteBooks', [WishListController::class, 'showFavoriteBooks'])->name('favoriteBooks');
    Route::get('/deleteFavoriteBook/{id}', [WishListController::class, 'deleteFavoriteBook'])->name('deleteFavoriteBook');
    
});
