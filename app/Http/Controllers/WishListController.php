<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use Illuminate\Support\Facades\DB;
class WishListController extends Controller
{
    //
    public function saveFavorite(Request $request){
        $userId = $request->userId;
        $bookId = $request->bookId;

        $checkLikedBook = WishList::where('userId', $userId)->where('bookId', $bookId)->first();
        if (!empty($checkLikedBook)) {
            return response()->json(['success'=> false], 200);
        }

        WishList::create($request->all());
        return response()->json(['success'=> true], 200);
    }
    public function showFavoriteBooks() {
        $active = "check";
        $books = DB::table('wish_lists')->leftJoin('books', 'wish_lists.bookId', '=', 'books.id')
            ->where('userId', session('userId'))->paginate(10, ['books.ddcCode', 'books.name',
             'books.author', 'books.genre',  'books.image', 'books.id']);
        return view('favoriteBooks', compact('active', 'books'));
    }

    public function deleteFavoriteBook(Request $request, $id) {
        $book = WishList::where('bookId', $id)->where('userId', session('userId'));
        $book->delete();
        // return redirect()->back()->with("flash_message_success", "Delete book");
        
        return response()->json(['deleted'=> true], 200);
    }
    public function deleteFavoriteBookList(Request $request, $id) {
        
        $book = WishList::where('bookId', $id)->where('userId', session('userId'));
        $book->delete();
        return redirect()->back()->with("flash_message_success", "Delete book");
    }
    
}
