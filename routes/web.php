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
    $user = Auth::user();
    $cart = Auth::user()->cart()->get();
    $cart_products= $cart[0]->products()->get();
    if($cart_products->isEmpty()) {
        return redirect('/');
    }

    $fileLocation = "data/address/";
    

    $provinceFile = fopen($fileLocation."province.json" ,"r") or die("Unable to open $fileLocation.province.json file");
    $provinceContents = fread($provinceFile, filesize($fileLocation."province.json"));
    $provinceData = json_decode($provinceContents);
    fclose($provinceFile);

    $regionFile = fopen($fileLocation."region.json" ,"r") or die("Unable to open $fileLocation.region.json file");
    $regionContents = fread($regionFile, filesize($fileLocation."region.json"));
    $regionData = json_decode($regionContents);
    fclose($regionFile);

    $cityFile = fopen($fileLocation."city.json" ,"r") or die("Unable to open $fileLocation.city.json file");
    $cityContents = fread($cityFile, filesize($fileLocation."city.json"));
    $cityData = json_decode($cityContents);
    fclose($cityFile);

    $barangayFile = fopen($fileLocation."barangay.json" ,"r") or die("Unable to open $fileLocation.barangay.json file");
    $barangayContents = fread($barangayFile, filesize($fileLocation."barangay.json"));
    $barangayData = json_decode($barangayContents);
    fclose($barangayFile);

    return view('checkout', [
        "cartproducts" => $cart_products,
        'displayCart' => false,
        'user' => $user,
        'provinceData' => $provinceData,
        'regionData' => $regionData,
        'cityData' => $cityData,
        'barangayData' => $barangayData,

    ]);
})->middleware('auth');