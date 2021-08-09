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
        $active = "statistic";
        $book = DB::table('books')->get();
        $borrow = DB::table('borrowings')->get();
        $a = DB::table('borrowings')->where('borrowings.returned', '!=', 'returned')->get(['borrowings.quantity as quantity']);
        if (Borrowing::count() > 0)
            $mostBook = DB::table('books')
                ->join('borrowings', 'borrowings.bookId', 'books.id')
                ->where('borrowings.returned', '!=', 'returned')
                ->select(DB::raw('sum(borrowings.quantity) as totalforEach, books.name'))
                ->groupBy('books.name')
                ->orderBy('totalforEach', 'desc')
                ->get();
        else $mostBook = null;
        $author = 0;
        $quantityBook = 0;
        $borrowBook = 0;
        $booktype = 0;
        $country = 0;
        $totalPrice = 0;
        foreach ($book as $key) {
            $author++;
            $booktype++;
            $country++;

            $quantityBook += $key->copies;
        }
        foreach ($book as $key) {
            $totalPrice += $key->price;
        }
        foreach ($a as $key) {
            $borrowBook += $key->quantity;
        }
        return view('statisticBook', compact('active', 'quantityBook', 'borrowBook', 'booktype', 'mostBook', 'totalPrice', 'book', 'country', 'author'));
    }
    public function viewUser(Request $request)
    {
        $active = "statistic";
        $user = DB::table('users')->get();
        if (Borrowing::count() > 0)
            $usuallyUser = DB::table('users')
                ->join('borrowings', 'borrowings.userId', 'users.id')
                ->select(DB::raw('sum(borrowings.quantity) as totalforEach, users.username'))
                ->groupBy('username')
                ->orderBy('totalforEach', 'desc')
                ->get();
        else $usuallyUser = null;
        $activeUser = DB::table('borrowings')->join('users', 'borrowings.userId', 'users.id')->get();
        $quantityActive = 0;
        foreach ($activeUser as $key) {
            $quantityActive++;
        }
        $userquantity = 0;
        foreach ($user as $key) {
            $userquantity++;
        }
        return view('statisticUser', compact('active', 'userquantity', 'usuallyUser', 'quantityActive'));
    }
    public function viewRent(Request $request)
    {
        $active = "statistic";
        $borrowing = DB::table('borrowings')->get();
        $rentTime = 0;
        foreach ($borrowing as $key) {
            $rentTime++;
        }
        if (Borrowing::count() > 0) {

            $mostBookRentDay = DB::table('borrowings')
                ->select(DB::raw('count(borrowings.borrowDate) as totalforEach1, borrowDate'))
                ->groupBy('borrowDate')
                ->orderBy('totalforEach1', 'desc')
                ->get();
            $mostRentDay = DB::table('borrowings')
                ->select(DB::raw('count(borrowings.borrowDate) as totalforEach1, borrowDate'))
                ->groupBy('borrowDate')
                ->orderBy('totalforEach1', 'asc')
                ->get();
        } else {
            $mostBookRentDay = null;
            $mostRentDay = null;
        }
        return view('statisticRent', compact('active', 'rentTime', 'mostRentDay', 'mostBookRentDay'));
    }
}
