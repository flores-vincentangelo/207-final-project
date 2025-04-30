<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function search(Request | string $request) {
        if(gettype($request) == "string") {
            $query = $request;
        } else {
            $query = $request->input("query");
        }
        $results = Product::where('name', 'like', "%$query%")->orWhere('description', 'like', "%$query%")->get();
        return $results;
    }
}
