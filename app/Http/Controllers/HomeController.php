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
    public function viewManageBookRented(Request $request) {
        $active = "pages";
        $borrow = DB::table('borrowings')->join('users','users.id','borrowings.userId')
        ->join('books','books.id','borrowings.bookId')
        ->where('borrowings.id','=',$request->id)
        ->get(['borrowings.*','users.username as username','books.name as name'])
        ->first();
        return view('rents_byId', compact('borrow'));
    }
    public function manageBookRented(Request $request)
    {
        // code...
        DB::table('borrowings')->where('id', $request->id)->update([
        'quantity'=>$request->quantity,
        'borrowDate'=>$request->borrowDate,
        'returnDate'=>$request->returnDate,
        'returned'=>$request->status,
    ]
        );
        return redirect(route('books_rented'));
    }
    public function deleteBookRented(Request $request)
    {
        $b = DB::table('borrowings')->where('id','=',$request->id)->delete();
        return redirect(route('books_rented'));
    }
}
