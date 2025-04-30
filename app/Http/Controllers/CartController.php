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
        $incomingFields = $request->validate([
            "quantity" => 'gt:0'
        ]);
        $quantity = $incomingFields['quantity'];

        $product_from_query = $cart[0]->products()->where('product_id', $product->id)->get();
        if ($product_from_query->isEmpty()) {
            $cart[0]->products()->attach($product->id, ["quantity" => $quantity]);
        } else {
            $newQuantity = $quantity + $product_from_query[0]->pivot->quantity;
            $cart[0]->products()->syncWithoutDetaching([$product->id => ['quantity' => $newQuantity]]);
        }
        
        return redirect('/');
    }

    public function createCart() {
        $user = Auth::user();
        $cart = Cart::create([
            "user_id" => $user->id
        ]);

        return $cart;
    }

    public function updateCart(Product $product, Request $request) {
        $cart = Auth::user()->cart()->get();
        $incomingFields = $request->validate([
            "quantity" => 'gt:-1'
        ]);

        $quantity = $incomingFields['quantity'];

        if( $quantity == 0 ){
            $cart[0]->products()->detach($product->id);
        } else {
            $cart[0]->products()->syncWithoutDetaching([$product->id => ['quantity' => $quantity]]);
        }

        return redirect('/');
    }
}
