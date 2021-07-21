<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

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
}
