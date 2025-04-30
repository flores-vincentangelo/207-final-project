<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::redirect('/', '/home');
Route::get('/home/{query?}', function (Request $request) {
    
    // echo var_dump($request);
    $user = Auth::user();
    $products = (new ProductController)->search($request);
    $cart = Auth::user()->cart()->get();
    $cart_products = null;
    if ($cart->isEmpty()) {
        $cart = (new CartController)->createCart();
        $cart_products = $cart->products()->get();
    } else {
        $cart_products = $cart[0]->products()->get();
    }

    return view('home', ['user'=> $user, 'products' => $products, 'cart' => $cart[0], 'cart_products' => $cart_products]);
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

    return view('checkout', ["cartproducts" => $cart_products]);
})->middleware('auth');