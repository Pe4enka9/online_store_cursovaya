<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Carts\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(
        private CartService $cartService,
    )
    {
    }

    public function index(): View
    {
        /** @var User $user */
        $user = auth()->user();
        $orders = $user->orders;

        return view('orders.index', [
            'orders' => $orders,
            'cartService' => $this->cartService,
        ]);
    }

    public function store(): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $cart = $user->cart;
        $products = $cart->products;

        foreach ($products as $product) {
            $cart->products()->updateExistingPivot($product->id, ['price' => $product->price]);
        }

        $user->orders()->create([
            'cart_id' => $cart->id,
            'total_price' => $cart->getTotalPrice(),
        ]);

        $cart->update(['is_active' => false]);
        $user->carts()->create();

        return redirect()->route('home');
    }
}
