<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Publisher;
use App\Services\Carts\CartService;
use App\Services\Products\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private CartService    $cartService,
        private ProductService $productService,
    )
    {
    }

    public function index(Request $request): View
    {
        $products = $this->productService->filter($request)->get();
        $categories = Category::all();
        $publishers = Publisher::all();

        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'publishers' => $publishers,
            'cartItems' => $this->cartService->getCartItems(),
        ]);
    }
}
