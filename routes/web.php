<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $products = [];
    $cart = null;
    $cart_products = null;
    if(Auth::user()) {
        $products = Product::all();
        $cart = Auth::user()->cart()->get();
        if ($cart->isEmpty()) {
            $cart = (new CartController)->createCart();
        }

        $cart_products = $cart[0]->products()->get();
        $product2 = $cart[0]->products()->where('product_id', 6)->get();
    }
    return view('home', ['products' => $products, 'cart' => $cart[0], 'cart_products' => $cart_products, 'product2' => $product2]);
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);



Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [UserController::class, 'register']);

Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart']);
Route::put('/update-cart/{product}', [CartController::class, 'updateCart']);
