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
            'returned' => 'waiting' //3 status is waiting, borrowing, returned.
        ]);
        //save new copies to book table
        $book->copies = $book->copies - $request->quantity;
        $book->save();

        toast('Successfully','success');
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
    public function deleteBookRented(Request $request, $id)
    {   

        $b = DB::table('borrowings')->where('id','=',$id)->delete();
        return redirect()->back()->with("flash_message_success", "Delete success");
    }
    
    public function waitingOrders(Request $request) {
        $orders = DB::table('borrowings')->join('books', 'books.id', 'borrowings.bookId')
                            ->join('userinfo', 'borrowings.userId', 'userinfo.userId')
                            ->where('borrowings.returned', "waiting")
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id as bookId', 'borrowings.id as borrowingId', 'userInfo.name as userName']);
        $status = 'waiting';
        return view('manageOrder', compact('orders', 'status'));
    }

    public function borrowingOrders(Request $request) {
        $orders = DB::table('borrowings')->join('books', 'books.id', 'borrowings.bookId')
                            ->join('userinfo', 'borrowings.userId', 'userinfo.userId')
                            ->where('borrowings.returned', "borrowing")
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id as bookId', 'borrowings.id as borrowingId', 'userInfo.name as userName']);
        return view('manageOrder', compact('orders'));
    }

    public function tookBook(Request $request) {
        $borrow = Borrowing::where('id', $request->borrowId)->first();
        $borrow->returned = "borrowing";
        $borrow->save();
        return redirect(route('waitingOrders'));
    }

    public function returnBook(Request $request) {
        $book = Book::where('id', $request->bookId)->first();
        $borrow = Borrowing::where('id', $request->borrowId)->first();
        $borrow->returned = "returned";
        $book->copies = $book->copies + $borrow->quantity;
        $book->save();
        $borrow->save();
        return redirect(route('borrowingOrders'));
    }

    public function cancelBorrow(Request $request, $id) {
        $borrow = Borrowing::where('id', $id)->first();
        $book = Book::where('id', $borrow->bookId)->first();
        $book->copies = $book->copies + $borrow->quantity;
        $book->save();
        $borrow->delete();
        return redirect(route('borrowedBooks'));
    }
}
