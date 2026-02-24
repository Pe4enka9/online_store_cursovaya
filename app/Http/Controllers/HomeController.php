<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Carts\CartService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private CartService $cartService,
    )
    {
    }

    public function index(): View
    {
        $products = Product::all();

        return view('home', [
            'products' => $products,
            'cartService' => $this->cartService,
        ]);
    }
}
