<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function show(Cart $cart): View
    {
        return view('carts.show', ['cart' => $cart]);
    }

    public function add(Product $product): RedirectResponse
    {
        $cart = auth()->user()->cart;
        $cart->products()->attach($product->id);

        return redirect()->route('home');
    }
}
