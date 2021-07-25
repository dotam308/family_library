<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;


class BookController extends Controller
{
    //
    public function index() {
        $books = Book::get();
        return view('books', compact('books'));
    }
    public function addBookForm() {
        return view('addBook');
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
        $bookId = $request->id;
        $book = Book::where('id', $request->id)->get()->first();
        return view('editBook', compact('book'));
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
        $books = Book::get();
        return view('manageBook', compact('books'));
    }
   
    public function showBorrowedBookList(Request $request) {
        $id = session('userId');
        $books = Borrowing::join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "false")
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id']);
        return view('borrowedBookList', compact('books'));
    }

    public function showReturnedBookList(Request $request) {
        $id = session('userId');
        $books = Borrowing::join('books', 'borrowings.bookId', '=', 'books.id')
                            ->where('borrowings.userId', $id)
                            ->where('borrowings.returned', "true")
                            ->get(['books.ddcCode', 'books.name', 'books.author', 'books.genre', 'borrowings.quantity', 'borrowings.borrowDate', 'borrowings.returnDate', 'borrowings.returned', 'books.image', 'books.id']);
        $returned = true;
        return view('borrowedBookList', compact('books', 'returned'));
    }
}
