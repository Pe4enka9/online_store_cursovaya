<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\Carts\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(
        private CartService $cartService,
    )
    {
    }

    public function show(Cart $cart): View
    {
        return view('carts.show', [
            'cart' => $cart,
            'cartItems' => $this->cartService->getCartItems(),
        ]);
    }

    public function add(Product $product): RedirectResponse
    {
        $this->cartService->addProduct($product);

        return redirect()->back();
    }

    public function subtract(Product $product): RedirectResponse
    {
        $this->cartService->subtractProduct($product);

        return redirect()->back();
    }
}
