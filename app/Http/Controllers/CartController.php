<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function index() {
        $booksInCartIdArray = session()->get("cart");
        $books = Book::findMany($booksInCartIdArray);
        return view("pages.cart", compact("books"));
    }
}
