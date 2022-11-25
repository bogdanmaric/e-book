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

Route::get("/ebook/cart", ["App\Http\Controllers\CartController","index"])->name("cart");
Route::resource("/ebook/category", App\Http\Controllers\CategoryControllerR::class);
Route::resource("/ebook", App\Http\Controllers\BookControllerR::class);


require __DIR__.'/auth.php';
