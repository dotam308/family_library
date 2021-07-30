<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\BookReview;

class HomeController extends Controller
{
    public function index(Request $request) {
        $active = "index";
        $book = DB::table('books')->get();
        $borrow = DB::table('borrowings')->get();
        $user = DB::table('users')->get();
        $a = DB::table('borrowings')->where('borrowings.returned','=','false')->get(['borrowings.quantity as quantity']);
        $quantityBook = 0;
        $borrowBook = 0;
        $booktype = 0;
        $rentlist=0;
        $userquantity=0;
        foreach ($book as $key) {
            $booktype++;
            $quantityBook += $key->copies;
        }
        foreach ($borrow as $key) {
            $rentlist++;
        }
        foreach ($a as $key) {
            $borrowBook+=$key->quantity;
        }
        foreach ($user as $key) {
            $userquantity++;
        }
        return view('index', compact('active','quantityBook','borrowBook','rentlist','booktype','userquantity'));
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
        $active = "manage";
        return view('books_detail', compact('active'));
    }
    public function viewBookDetailById(Request $request) {
        $active = "manage";
        $reviews= BookReview::get();
        $book = Book::where('id', $request->id)->first();
        return view('book_detail_byId', compact('book', 'active', 'reviews'));
    }
    public function viewBookDetailByIdPost(Request $request) {
        $active = "manage";
        $id = $request->id;
        BookReview::create([
            'bookId'=>$id,
            'review'=>$request->editor1,
            'reviewer'=>session('username')
        ]);
        return redirect()->route('book_detail_byId', compact('id'));
    }

    public function borrowBookForm(Request $request) {
        $book = Book::where('id', $request->id)->first();
        return view('borrowBook', compact('book'));
    }

    public function borrowBookPost(Request $request) {
        // $this->validate($request, [
        //  'quantity'=>'required|numeric',
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
  
    public function viewBookRented(Request $request) {
        $active = "manage";  
        if ($request->quantityx == 'quantity' && $request->desc == 'd'){
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('borrowings.quantity', 'desc')
                  ->get();
        }
        else if ($request->quantityx == 'quantity' && $request->insc == 'i') {
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('borrowings.quantity', 'asc')
                  ->get();
        }
        else if ($request->bookname == 'bookname' && $request->insc == 'i') {
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('books.name', 'asc')
                  ->get();
        }
        else if ($request->bookname == 'bookname' && $request->desc == 'd') {
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('books.name', 'desc')
                  ->get();
        }
        else if ($request->borrower == 'borrower' && $request->insc == 'i') {
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('users.username', 'asc')
                  ->get();
        }
        else if ($request->borrower == 'borrower' && $request->desc == 'd') {
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('users.username', 'desc')
                  ->get();
        }
        else if ($request->brdate == 'brdate' && $request->insc == 'i') {
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('borrowings.borrowDate', 'asc')
                  ->get();
        }
        else if ($request->drdate == 'brdate' && $request->desc == 'd') {
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('borrowings.borrowDate', 'desc')
                  ->get();
        }
        else if ($request->redate == 'redate' && $request->desc == 'd') {
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('borrowings.returnDate', 'desc')
                  ->get();
        }
        else if ($request->redate == 'redate' && $request->insc == 'i') {
            $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')->orderBy('borrowings.returnDate', 'asc')
                  ->get();
        }
        else {
        $borrow = DB::table('borrowings')
                  ->join('books','borrowings.bookId','=','books.id')
                  ->join('users','borrowings.userId','=','users.id')
                  ->select('borrowings.*', 'users.username', 'books.name')
                  ->get();
              }
        
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
        $borrow = Borrowing::where('id', $request->id)->first();
        $book = Book::where('id', $borrow->bookId)->first();
        $old = $borrow->quantity;
        $borrow->quantity = $request->quantity;
        $borrow->borrowDate = $request->borrowDate;
        $borrow->returnDate = $request->returnDate;
        $borrow->returned = $request->returned;
        $borrow->save();
        $book->copies = $book->copies + $old - $borrow->quantity;
        $book->save();
        toast('Successfully','success');
        return redirect(route('books_rented'));
    }
    public function deleteBookRented(Request $request, $id)
    {   
        $borrow = Borrowing::where('id', $id)->first();
        $book = Book::where('id', $borrow->bookId)->first();
        $book->copies = $book->copies + $borrow->quantity;
        $book->save();
        $br = DB::table('borrowings')->where('id','=',$id)->delete();
        return redirect()->back()->with("flash_message_success", "Delete success");
    }
    
    public function waitingOrders(Request $request) {
        $active = 'order';
        $orders = DB::table('borrowings')->join('books', 'books.id', 'borrowings.bookId')
                            ->join('users', 'borrowings.userId', 'users.id')
                            ->where('borrowings.returned', "waiting")
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id as bookId', 'borrowings.id as borrowingId', 'users.username as userName']);
        $status = 'waiting';
        return view('manageOrder', compact('orders', 'status', 'active'));
    }

    public function borrowingOrders(Request $request) {
        $active = 'order';
        $orders = DB::table('borrowings')->join('books', 'books.id', 'borrowings.bookId')
                            ->join('users', 'borrowings.userId', 'users.id')
                            ->where('borrowings.returned', "borrowing")
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id as bookId', 'borrowings.id as borrowingId', 'users.username as userName']);
        return view('manageOrder', compact('orders', 'active'));
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
