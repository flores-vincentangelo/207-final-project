<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::redirect('/', '/home');
Route::get('/home/{query?}', function (Request $request) {
    
    $query = $request->input('query');
    $min = $request->input('min');
    $max = $request->input('max');
    $rating = $request->input('rating');
    $products = null;
    if ( $min || $max || $rating) {
        // $products = (new ProductController)->filter();
        $products = (new ProductController)->filter($min, $max, $rating);
    } else {
        $products = (new ProductController)->search($query);
    }

    $cart = Auth::user()->cart()->get();
    $cart_products = null;
    if ($cart->isEmpty()) {
        $cart = (new CartController)->createCart();
        $cart_products = $cart->products()->get();
    } else {
        $cart_products = $cart[0]->products()->get();
    }

    return view('home', ['products' => $products, 'cart' => $cart[0], 'cart_products' => $cart_products, 'displayCart' => true]);
})->middleware('auth');

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

Route::get('/checkout', function() {
    $cart = Auth::user()->cart()->get();
    $cart_products= $cart[0]->products()->get();
    if($cart_products->isEmpty()) {
        return redirect('/');
    }

    return view('checkout', ["cartproducts" => $cart_products, 'displayCart' => false]);
})->middleware('auth');