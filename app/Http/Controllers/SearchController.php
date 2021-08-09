<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;


class SearchController extends Controller{

    public function bookSearch(Request $request){
        $search=$request->input('keywords');
        $searchValues = preg_split('/\s+/',$search, -1, PREG_SPLIT_NO_EMPTY);
        $catalog=$request->input('catalog');
        $copies=$request->input('copies');
        $price=$request->input('price');
        $books=Book::where(function ($query) use ($searchValues,$catalog){
            foreach($searchValues as $value) {
                if($catalog){
                    $query->where($catalog, 'like', "%{$value}%");
                }else{
                $query->where('ddcCode', 'like', "%{$value}%")
                      ->orWhere('name', 'like', "%{$value}%")
                      ->orWhere('author', 'like', "%{$value}%")
                      ->orWhere('genre', 'like', "%{$value}%")
                      ->orWhere('publisher', 'like', "%{$value}%")
                      ->orWhere('translator', 'like', "%{$value}%")
                      ->orWhere('country', 'like', "%{$value}%");
                }
            }
        })->where(function($query)use($copies){
            switch($copies){
                case "1":
                    $query->where('copies','<',50);
                break;
                case "2":
                    $query->where('copies','>=',50)->where('copies','<',100);
                break;
                case "3":
                    $query->where('copies','>=',100)->where('copies','<',150);
                break;
                case "4":
                    $query->where('copies','>=',150);
            }
        })->where(function($query)use($price){
            switch($price){
                case "1":
                    $query->where('price','<',500);
                break;
                case "2":
                    $query->where('price','>=',500)->where('price','<',1000);
                break;
                case "3":
                    $query->where('price','>=',1000)->where('price','<',1500);
                break;
                case "4":
                    $query->where('price','>=',1500);
            }
        })->paginate(10);
        return view('books',compact('books'));
    }

    public function bookManagementSearch(Request $request){
        $search=$request->input('keywords');
        $searchValues = preg_split('/\s+/',$search, -1, PREG_SPLIT_NO_EMPTY);
        $catalog=$request->input('catalog');
        $books=Book::where(function ($query) use ($searchValues,$catalog){
            foreach($searchValues as $value) {
                if($catalog){
                    $query->where($catalog, 'like', "%{$value}%");
                }else{
                $query->where('ddcCode', 'like', "%{$value}%")
                      ->orWhere('name', 'like', "%{$value}%")
                      ->orWhere('author', 'like', "%{$value}%")
                      ->orWhere('genre', 'like', "%{$value}%")
                      ->orWhere('publisher', 'like', "%{$value}%")
                      ->orWhere('translator', 'like', "%{$value}%")
                      ->orWhere('country', 'like', "%{$value}%");
                }
            }
        })->paginate(10);
        return view('manageBook',compact('books'));
    }

    public function bookFavSearch(Request $request){
        $search=$request->input('keywords');
        $searchValues = preg_split('/\s+/',$search, -1, PREG_SPLIT_NO_EMPTY);
        $catalog=$request->input('catalog');
        $books=Book::where(function ($query) use ($searchValues,$catalog){
            foreach($searchValues as $value) {
                if($catalog){
                    $query->where($catalog, 'like', "%{$value}%");
                }else{
                $query->where('ddcCode', 'like', "%{$value}%")
                      ->orWhere('name', 'like', "%{$value}%")
                      ->orWhere('author', 'like', "%{$value}%")
                      ->orWhere('genre', 'like', "%{$value}%")
                      ->orWhere('publisher', 'like', "%{$value}%")
                      ->orWhere('translator', 'like', "%{$value}%")
                      ->orWhere('country', 'like', "%{$value}%");
                }
            }
        })->paginate(10);
        return view('favoriteBooks',compact('books'));
    }

    public function bookBorrowSearch(Request $request){
        $search=$request->input('keywords');
        $searchValues = preg_split('/\s+/',$search, -1, PREG_SPLIT_NO_EMPTY);
        $catalog=$request->input('catalog');
        $books=Book::where(function ($query) use ($searchValues,$catalog){
            foreach($searchValues as $value) {
                if($catalog){
                    $query->where($catalog, 'like', "%{$value}%");
                }else{
                $query->where('name', 'like', "%{$value}%")
                      ->orWhere('username', 'like', "%{$value}%")
                      ->orWhere('borrowDate', 'like', "%{$value}%")
                      ->orWhere('returnDate', 'like', "%{$value}%");
                }
            }
        })->paginate(10);
        return view('books_rented',compact('b'));
    }

    public function userSearch(Request $request){
        $search=$request->input('keywords');
        $searchValues = preg_split('/\s+/',$search, -1, PREG_SPLIT_NO_EMPTY);
        $users=User::where(function ($query) use ($searchValues){
            foreach($searchValues as $value) {
                $query->orWhere('id', 'like', "%{$value}%")
                      ->orWhere('username', 'like', "%{$value}%")
                      ->orWhere('email', 'like', "%{$value}%")
                      ->orWhere('role', 'like', "%{$value}%");
            }
        })->paginate(10);
        return view('users',compact('users'));
    }

    public function searchBookWhenAddBorrowing(Request $request) {
        if($request->get('query')) {
            $query = $request->get('query');
            $data = Book::where('name', 'LIKE', "%{$query}%")
                    ->where('copies', '>', 0)->get();
            $output = '<ul class="dropdown-menu" style="display: block; position: relative">';
            foreach($data as $row) {
                $output .= '<li><a href="#">' . $row->name . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

}