<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function index() {
        $booksInCartIdArray = session()->get("cart");
        $books = Book::findMany($booksInCartIdArray);
        return view("pages.cart", compact("books"));
    }

    /**
     * Adds book to the cart
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function addBookToCart(Request $request, $id)
    {
        $request->session()->get("cart")->put($id, $id);
        return redirect(RouteServiceProvider::HOME)->with("status", "Knjiga je uspešno dodata u korpu");
    }

    /**
     * Remove book from the cart
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeBookFromCart(Request $request, $id)
    {
        $request->session()->get("cart")->forget($id);
        return redirect("/ebook/cart")->with("status", "Knjiga je uspešno uklonjena iz korpe");
    }
}
