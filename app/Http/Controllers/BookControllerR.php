<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class BookControllerR extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view("pages.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("pages.add-book", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->image_link = $request->image_link;
        $book->book_link = $request->book_link;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->save();

        return redirect(RouteServiceProvider::HOME)->with("Uspešno dodata knjiga u katalog radnje");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view("pages.book", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view("pages.update-book", compact("book", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = new Book();
        $book = Book::find($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->image_link = $request->image_link;
        $book->book_link = $request->book_link;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->save();

        return redirect(RouteServiceProvider::HOME)->with("Uspešno promenjene informacije o knjizi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect(RouteServiceProvider::HOME)->with("status", "Knjiga je uspešno obrisana iz kataloga");
    }

    /**
     * Page for admin login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminPageShow(Request $request)
    {
        return view("pages.admin");
    }

    /**
     * Admin login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminLogIn(Request $request)
    {
        return view("pages.admin");
    }
}
