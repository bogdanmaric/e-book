<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("/ebook");
});

Route::middleware("cart.created")->group(function (){
    Route::get("/ebook/cart", ["App\Http\Controllers\CartController","index"])->name("cart");
    Route::post("/ebook/{id}", ["App\Http\Controllers\CartController","addBookToCart"])->name("addBookToCart");
    Route::delete("/ebook/cart/{id}", ["App\Http\Controllers\CartController","removeBookFromCart"])->name("removeBookFromCart");
    Route::resource("/ebook/category", App\Http\Controllers\CategoryControllerR::class);
    Route::resource("/ebook", App\Http\Controllers\BookControllerR::class);
});

require __DIR__.'/auth.php';
