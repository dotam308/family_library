<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(Request $request) {
        $active = "index";
        return view('index', compact('active'));
    }
    // public function viewBooks() {
    //     $active = "books";
    //     return view('books', compact('active'));
    // }
    public function viewContact() {
        $active = "contact";
        return view('contact', compact('active'));
    }
    public function viewCart() {
        $active = "pages";
        return view('cart', compact('active'));
    }
    public function viewCheckout() {
        $active = "pages";
        return view('checkout', compact('active'));
    }
    public function view404() {
        $active = "pages";
        return view('404', compact('active'));
    }
    public function viewBookDetailed() {
        $active = "pages";
        return view('books_detail', compact('active'));
    }
    public function viewBookDetailById(Request $request) {
        $book = Book::where('id', $request->id)->first();
        return view('book_detail_byId', compact('book'));
    }

    public function borrowBookForm(Request $request) {
        $book = Book::where('id', $request->id)->first();
        return view('borrowBook', compact('book'));
    }

    public function borrowBookPost(Request $request) {
        $this->validate($request, [
			'quantity'=>'required|numeric',
            // 'returnDate'=>'',
            ]
		);
        $book = Book::where('id', $request->id)->first();
        //save to borrowing table
        Borrowing::create([
            'userId' => session('userId'),
            'bookId'=> $book->id,
            'quantity' => $request->quantity,
            'borrowDate' => date('Y-m-d'),
            'returnDate' => $request->returnDate,
            'returned' => 'false'
        ]);

        return redirect(route('books'));
    }
  
    public function viewBookRented() {
        $active = "pages";
        $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')
                  ->get();
        return view('books_rented', compact('active','borrow'));
    }
    public function viewBookRentedById(Request $request) {
        $active = "pages";
        $borrow = DB::table('borrowings')->where('bookId', $request->id)->get();

        return view('books_rented_byId', compact('active','borrow'));
    }
}
