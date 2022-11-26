<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function index() {
        $cart = session()->get("cart");
        return view("pages.cart", compact("cart"));
    }
}
