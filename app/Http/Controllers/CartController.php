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
            $books[] = Book::find($id)->book_link;
        }

        $details = [
            "title" => "Realizovana kupovina na E-Book vebsajtu",
            "name" => $request["name"],
            "books" => $books
        ];
        Mail::to($request["email"])->send(new \App\Mail\BookPurchaseMail($details));

        $request->session()->forget("cart");
        return redirect(RouteServiceProvider::HOME)->with(
            "status",
            "Kupovina je uspešno obavljena, na vaš imejl ćete dobiti linkove kupljenijh knjiga"
        );
    }
}
