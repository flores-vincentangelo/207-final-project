<?php

use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::all();
    return view('home', ['products'=> $products]);
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout']);



Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [UserController::class, 'register']);
