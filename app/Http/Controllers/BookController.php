<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    //
    public function index() {
        $books = Book::get();
        $active = "books";
        return view('books', compact('books', 'active'));
    }
    public function addBookForm() {
        $active = "books";
        return view('addBook', compact('active'));
    }
    public function addBookPost(Request $request) {
        $this->validate($request, [
			'name' => 'required',
			'price'=>'required|numeric',
            'copies'=>'numeric',
            ]
		);
        // kiểm tra có files sẽ xử lý
        $book = Book::create($request->all());
        if($request->hasFile('img')) {
			$allowedfileExtension=['jpg','png'];
			$file = $request->file('img');
			$exe_flg = true;
            $extension = $file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);

            if(!$check) {
                // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                $exe_flg = false;
            }
			// nếu không có file nào vi phạm validate thì tiến hành lưu DB
			if($exe_flg) {
                // lưu product
                $image = $request->img;
                $filename = $image->store('public');
                $filename = substr($filename, 6);
                $book->image = $filename;
                $book->save();
                return redirect(route('manageBooks'));
			} 
		}
        
        return view('manageBooks');
    }
    public function editBookForm(Request $request) {
        $active = "manage";
        $bookId = $request->id;
        $book = Book::where('id', $request->id)->get()->first();
        return view('editBook', compact('book', 'active'));
    }
    public function editBookPost(Request $request) {
        $this->validate($request, [
			'name' => 'required',
			'price'=>'required|numeric',
            'copies'=>'numeric',
            ]
		);
        $book = Book::where('id', $request->id)->first();
        $book->ddcCode = $request->ddcCode;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->publisher = $request->publisher;
        $book->translator = $request->translator;
        $book->country = $request->country;
        $book->review = $request->review;
        $book->copies = $request->copies;
        $book->price = $request->price;
        $book->save();
        if($request->hasFile('img')) {
			$allowedfileExtension=['jpg','png'];
			$file = $request->file('img');
			$exe_flg = true;
            $extension = $file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);

            if(!$check) {
                // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                $exe_flg = false;
            }
			// nếu không có file nào vi phạm validate thì tiến hành lưu DB
			if($exe_flg) {
                // lưu product
                $image = $request->img;
                $filename = $image->store('public');
                $filename = substr($filename, 6);
                $book->image = $filename;
                $book->save();
                return redirect(route('manageBooks'));
			} 
		}
        return redirect(route('manageBooks'));
    }

    // public function confirmDeleteBook(Request $request) {
        
    //     $check = alert()->warning('Deleting user -<br/>are you sure?')
    //     ->showCancelButton($btnText = 'Cancel', $btnColor = '#dc3545')
    //     ->showConfirmButton($btnText = '<a href="manageBooks?delete=yes&id='.$request->id.'">Yes</a>', $btnColor = '#38c177')
    //     ->autoClose(false);
    //     return back()->with('success','Post deleted successfully');
    // }
    public function deleteBook(Request $request, $id) {
        // $book = Book::where('id', $request->id)->first();
        $book = Book::where('id', $id)->first();
        $book->delete();
        // return response()->json(['status'=> 'Deleted successfully']);
        // return route('manageBooks');
        return redirect()->back()->with("flash_message_success", "Delete book");
    }

    //for Admin
    public function showBookList(Request $request) {
        // if ($request->delete == 'yes') {
        //     $id = $request->id;
        //     return redirect(route('deleteBook', compact('id')));
        // }
        $active = "manage";
        if ($request->dc == "r" && $request->insc == "r") {
            $books = DB::table('books')->orderBy('books.ddcCode','asc')->get();
        }
        else if ($request->dc == "r" && $request->desc == "r") {
            $books = DB::table('books')->orderBy('books.ddcCode','desc')->get();
        }
        else if ($request->bn == "r" && $request->insc == "r") {
            $books = DB::table('books')->orderBy('books.name','asc')->get();
        }
        else if ($request->bn == "r" && $request->desc == "r") {
            $books = DB::table('books')->orderBy('books.name','desc')->get();
        }
        else if ($request->au == "r" && $request->insc == "r") {
            $books = DB::table('books')->orderBy('books.author','asc')->get();
        }
        else if ($request->au == "r" && $request->desc == "r") {
            $books = DB::table('books')->orderBy('books.author','desc')->get();
        }
        else if ($request->ge == "r" && $request->insc == "r") {
            $books = DB::table('books')->orderBy('books.genre','asc')->get();
        }
        else if ($request->ge == "r" && $request->desc == "r") {
            $books = DB::table('books')->orderBy('books.genre','desc')->get();
        }
        else if ($request->pub == "r" && $request->insc == "r") {
            $books = DB::table('books')->orderBy('books.publisher','asc')->get();
        }
        else if ($request->pub == "r" && $request->desc == "r") {
            $books = DB::table('books')->orderBy('books.publisher','desc')->get();
        }
        else if ($request->trans == "r" && $request->insc == "r") {
            $books = DB::table('books')->orderBy('books.translator','asc')->get();
        }
        else if ($request->trans == "r" && $request->desc == "r") {
            $books = DB::table('books')->orderBy('books.translator','desc')->get();
        }
        else if ($request->coun == "r" && $request->insc == "r") {
            $books = DB::table('books')->orderBy('books.country','asc')->get();
        }
        else if ($request->coun == "r" && $request->desc == "r") {
            $books = DB::table('books')->orderBy('books.country','desc')->get();
        }
        else if ($request->qua == "r" && $request->insc == "r") {
            $books = DB::table('books')->orderBy('books.copies','asc')->get();
        }
        else if ($request->qua == "r" && $request->desc == "r") {
            $books = DB::table('books')->orderBy('books.copies','desc')->get();
        }
        else if ($request->pri == "r" && $request->insc == "r") {
            $books = DB::table('books')->orderBy('books.price','asc')->get();
        }
        else if ($request->pri == "r" && $request->desc == "r") {
            $books = DB::table('books')->orderBy('books.price','desc')->get();
        }
        else {
        $books = DB::table('books')->get();
        }
        return view('manageBook', compact('books', 'active'));
    }
   
    public function showBorrowedBookList(Request $request) {
        $active = "check";
        $id = session('userId');
        if ($request->dc == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('books.ddcCode','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->dc == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('books.ddcCode','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->bn == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('books.name','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->bn == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('books.name','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->au == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('books.author','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->au == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('books.author','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->ge == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('books.genre','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->ge == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('books.genre','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->qua == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('borrowings.quantity','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->qua == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('borrowings.quantity','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->bd == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('borrowings.borrowDate','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->bd == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('borrowings.borrowDate','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->rd == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('borrowings.returnDate','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        else if ($request->rd == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', '!=',"returned")
                            ->orderBy('borrowings.returnDate','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }  
        else {
        $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)

                            ->where('borrowings.returned', '!=',"returned")
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.id as borrowId']);
        }
        return view('borrowedBookList', compact('books', 'active'));
    }

    public function showReturnedBookList(Request $request) {
        $active = "check";
        $id = session('userId');
        if ($request->dc == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned',"returned")
                            ->orderBy('books.ddcCode','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->dc == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned',"returned")
                            ->orderBy('books.ddcCode','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->bn == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('books.name','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->bn == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('books.name','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->au == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('books.author','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->au == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned',"returned")
                            ->orderBy('books.author','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->ge == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('books.genre','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->ge == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('books.genre','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->qua == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('borrowings.quantity','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->qua == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('borrowings.quantity','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->bd == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('borrowings.borrowDate','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->bd == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('borrowings.borrowDate','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->rd == "r" && $request->insc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('borrowings.returnDate','asc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        else if ($request->rd == "r" && $request->desc == "r") {
            $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->orderBy('borrowings.returnDate','desc')
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }  
        else {
        $books = DB::table('borrowings')->join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "returned")
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id', 'borrowings.updated_at as bookReturnedAt']);
        }
        $returned = true;
        return view('borrowedBookList', compact('books', 'returned', 'active'));
    }
}
