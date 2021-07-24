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
                return redirect(route('books'));
			} 
		}
        
        return view('addBook', compact('updateStatus'));
    }
    public function editBookForm(Request $request) {
        $bookId = $request->id;
        $book = Book::find($bookId)->first();
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
                return redirect(route('books'));
			} 
		}
        return redirect(route('books'));
    }

    public function deleteBook(Request $request) {
        $book = Book::where('id', $request->id)->first();
        $book->delete();
        return redirect(route('books'));
    }
   
}
