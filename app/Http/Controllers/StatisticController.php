<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
	public function viewBook(Request $request)
	{
		$active = "index";
        $book = Book::get();
        $bookTypes = Book::groupBy('books.genre')->get('books.genre');
        $bookAuthors = Book::groupBy('books.author')->get('books.author');
        $borrow = Borrowing::get();
        $a = Borrowing::where('borrowings.returned','borrowing')->get('borrowings.quantity');
        $mostBook = Book::join('borrowings','borrowings.bookId','books.id')->where('borrowings.returned','!=','returned')->select(DB::raw('sum(borrowings.quantity) as totalforEach, books.name'))->groupBy('books.name')->orderBy('totalforEach','desc')->get();
        $author = 0;          
        $quantityBook = 0;
        $borrowBook = 0;
        $booktype = 0;
        $country = 0;
        $totalPrice= 0;
        foreach ($book as $key) {
        	$author++;
            $booktype++;
            $country++;

            $quantityBook += $key->copies;
        }
        foreach ($book as $key) {
            $totalPrice+= $key->price;
        }
        foreach ($a as $key) {
            $borrowBook+=$key->quantity;
        }
        return view('statisticBook', compact('active','quantityBook','borrowBook','booktype','mostBook','totalPrice','book','country','author'));
	}
	public function viewUser(Request $request)
	{
		$active = "index";
        $user = User::get();
        $usuallyUser = User::join('borrowings','borrowings.userId','users.id')->select(DB::raw('sum(borrowings.quantity) as totalforEach, users.username'))->groupBy('username')->orderBy('totalforEach','desc')
                     ->get(); 
        $activeUser = Borrowing::join('users','borrowings.userId','users.id')->get();
        $quantityActive = 0;
        foreach ($activeUser as $key) {
        	$quantityActive++;
        }            
        $userquantity= 0;
        foreach ($user as $key) {
        	$userquantity++;
        }
		return view('statisticUser', compact('active','userquantity','usuallyUser','quantityActive'));
	}
	public function viewRent(Request $request)
	{	
		$active = "index";
        $borrowing = Borrowing::get();
        $rentTime = 0;
        foreach ($borrowing as $key) {
        	$rentTime++;
        }
        $mostBookRentDay = Borrowing::select(DB::raw('count(borrowings.borrowDate) as totalforEach1, borrowDate'))->groupBy('borrowDate')->orderBy('totalforEach1','desc')
                     ->get();
        $mostRentDay = Borrowing::select(DB::raw('count(borrowings.borrowDate) as totalforEach1, borrowDate'))->groupBy('borrowDate')->orderBy('totalforEach1','asc')
                     ->get();             
		return view('statisticRent', compact('active', 'rentTime', 'mostRentDay','mostBookRentDay'));
	}
}