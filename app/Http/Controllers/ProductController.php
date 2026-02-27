<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Carts\CartService;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private CartService $cartService,
    )
    {
    }

    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product,
            'cartItems' => $this->cartService->getCartItems(),
        ]);
    }
}
