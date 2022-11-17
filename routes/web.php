<?php

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

Route::get("/admin", [App\Http\Controllers\BookControllerR::class, "adminPageShow"]);
Route::resource("/ebook", App\Http\Controllers\BookControllerR::class);
