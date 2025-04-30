<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    //
    
    public function addToCart(Product $product, Request $request) {
        $cart = Auth::user()->cart()->get();
        $cart[0]->products()->attach($product->id, ["quantity" => $request->input('quantity')]);
        return redirect('/');
    }

    public function createCart() {
        $user = Auth::user();
        $cart = Cart::create([
            "user_id" => $user->id
        ]);

        return $cart;
    }
}
