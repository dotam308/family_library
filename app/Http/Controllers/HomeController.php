<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;

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
        // $this->validate($request, [
		// 	'quantity'=>'required|numeric',
        //     // 'returnDate'=>'',
        //     ]
		// );
        $book = Book::where('id', $request->id)->first();

        //if not signIn
        if (session('userId') == null) {
            alert()->warning('WarningAlert','You must signIn before')->width('500px');
            $bookId = $book->id;
            return redirect(route('signin', compact('bookId')));
        }
	
        //if quantity borrow > copies or returnDate <= current date
        if (($request->quantity == null) || ($request->quantity > $book->copies) || (($request->quantity <= 0) || ($request->returnDate <= date('Y-m-d')))) {
            alert()->info('InfoAlert','Your input is not satisfied.')->width('500px');
            return view('borrowBook', compact('book'));
        }
    
        //save to borrowing table
        Borrowing::create([
            'userId' => session('userId'),
            'bookId'=> $book->id,
            'quantity' => $request->quantity,
            'borrowDate' => date('Y-m-d'),
            'returnDate' => $request->returnDate,
            'returned' => 'false'
        ]);

        toast('Successfully','success');
        return redirect(route('books'));
    }
  
    public function viewBookRented() {
        $active = "pages";
        return view('books_rented', compact('active'));
    }
}
