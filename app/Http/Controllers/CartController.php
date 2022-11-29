<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function index()
    {
        $booksInCartIdArray = session()->get("cart");
        $books = Book::findMany($booksInCartIdArray);
        $total_price = $books->sum("price");
        return view("pages.cart", compact("books", "total_price"));
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
        return redirect("/ebook")->with("status", "Knjiga je uspešno dodata u korpu");
    }

    /**
     * Remove book from the cart
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function removeBookFromCart(Request $request, $id)
    {
        $request->session()->get("cart")->forget($id);
        return redirect("/ebook/cart")->with("status", "Knjiga je uspešno uklonjena iz korpe");
    }

    /**
     * Make purchase
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function purchaseBook(Request $request)
    {
        $books = [];
        foreach ($request->session()->get("cart")->all() as $id) {
            $book = Book::find($id);
            $books[$book->title] = $book->book_link;
        }

        $details = [
            "title" => "Uspešna kupovina",
            "name" => $request["name"],
            "books" => $books
        ];
        Mail::to($request["email"])->send(new \App\Mail\BookPurchaseMail($details));

        $request->session()->forget("cart");
        return redirect("/ebook")->with(
            "status",
            "Kupovina je uspešno obavljena, na vaš imejl ćete dobiti linkove kupljenijh knjiga"
        );
    }
}
