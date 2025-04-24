<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use \Illuminate\Database\Eloquent\Collection;

class productList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $products)
    {
        //

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-list', ['products' => "hello"]);
    }

}
