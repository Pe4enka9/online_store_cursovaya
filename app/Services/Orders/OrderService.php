<?php

namespace App\Services\Orders;

use App\Models\User;
use App\Services\Carts\CartService;

class OrderService
{
    public function __construct(
        private CartService $cartService,
    )
    {
    }

    // Создание заказа
    public function createOrder(User $user): void
    {
        $cart = $this->cartService->getCart();
        $this->cartService->setProductsPrice($cart);

        $user->orders()->create([
            'cart_id' => $cart->id,
            'total_price' => $cart->getTotalPrice(),
        ]);

        $this->cartService->closeCart($cart, $user);
    }
}
