<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;


class SearchController extends Controller{

    public function bookSearch(Request $request){
        $search=$request->input('keywords');
        $searchValues = preg_split('/\s+/',$search, -1, PREG_SPLIT_NO_EMPTY);
        $books=Book::where(function ($query) use ($searchValues){
            foreach($searchValues as $value) {
                $query->orWhere('ddcCode', 'like', "%{$value}%")
                      ->orWhere('name', 'like', "%{$value}%")
                      ->orWhere('author', 'like', "%{$value}%")
                      ->orWhere('genre', 'like', "%{$value}%")
                      ->orWhere('publisher', 'like', "%{$value}%")
                      ->orWhere('translator', 'like', "%{$value}%")
                      ->orWhere('country', 'like', "%{$value}%")
                      ->orWhere('review', 'like', "%{$value}%")
                      ->orWhere('copies', 'like', "%{$value}%")
                      ->orWhere('price', 'like', "%{$value}%");
            }
        })->paginate(6);
        return view('books',compact('books'));
    }

    public function bookManageSearch(Request $request){
        $search=$request->input('keywords');
        $searchValues = preg_split('/\s+/',$search, -1, PREG_SPLIT_NO_EMPTY);
        $books=Book::where(function ($query) use ($searchValues){
            foreach($searchValues as $value) {
                $query->orWhere('ddcCode', 'like', "%{$value}%")
                      ->orWhere('name', 'like', "%{$value}%")
                      ->orWhere('author', 'like', "%{$value}%")
                      ->orWhere('genre', 'like', "%{$value}%")
                      ->orWhere('publisher', 'like', "%{$value}%")
                      ->orWhere('translator', 'like', "%{$value}%")
                      ->orWhere('country', 'like', "%{$value}%")
                      ->orWhere('review', 'like', "%{$value}%")
                      ->orWhere('copies', 'like', "%{$value}%")
                      ->orWhere('price', 'like', "%{$value}%");
            }
        })->paginate(10);
        return view('manageBook',compact('books'));
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
}