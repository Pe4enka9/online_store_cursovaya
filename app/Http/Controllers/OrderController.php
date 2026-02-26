<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        /** @var User $user */
        $user = auth()->user();
        $orders = $user->orders;

        return view('orders.index', ['orders' => $orders]);
    }

    public function store(): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $cart = $user->cart;
        $user->orders()->create([
            'cart_id' => $cart->id,
            'total_price' => $cart->totalPrice(),
        ]);
        $cart->update(['is_open' => false]);
        $user->carts()->create();

        return redirect()->route('home');
    }
}
