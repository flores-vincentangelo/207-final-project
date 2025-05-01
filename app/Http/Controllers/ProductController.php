<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function search(Request | string | null $request) {
        $query = '';
        if(gettype($request) == "string" || !$request) {
            $query = $request;
        } else {
            $query = $request->input("query");
        }
        $results = Product::where('name', 'like', "%$query%")->orWhere('description', 'like', "%$query%")->get();
        return $results;
    }

    public function filter(string | null $min, string | null $max, string | null $rating) {
        // $results = Product::
        $minAmt = is_null($min) ? 0 : $min;
        $product = Product::where('price' ,'>', $minAmt);

        if(!is_null($max)) {
            $product = $product->where('price', '<', $max);
        }

        if(!is_null($rating)) {
            $product = $product->where('rating', '=', $rating);
        }

        $results = $product->get();
        return $results;
    }
}
