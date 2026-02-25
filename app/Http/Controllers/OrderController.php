<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function store(): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $cart = $user->cart;
        $cart->order()->create(['total_price' => $cart->totalPrice()]);
        $cart->update(['is_open' => false]);
        $user->carts()->create();

        return redirect()->route('home');
    }
}
