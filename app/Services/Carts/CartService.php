<?php

namespace App\Services\Carts;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;

class CartService
{
    // Получить текущую корзину
    public function getCart(): Cart
    {
        return auth()->user()->cart;
    }

    // Найти товар в текущей корзине
    private function findProduct(Product $product): ?Product
    {
        return $this->getCart()
            ->products()
            ->find($product->id);
    }

    // Создать товар в текущей корзине
    public function createProduct(Product $product): void
    {
        $this->getCart()->products()->attach($product->id);
    }

    // Получение товаров текущей корзины
    public function getCartItems(): Collection
    {
        if (!auth()->check()) return collect();

        return $this->getCart()->products->keyBy('id') ?? collect();
    }

    // Добавление товара в корзину
    public function addProduct(Product $product): void
    {
        $cartProduct = $this->findProduct($product);

        if (!$cartProduct) {
            $this->createProduct($product);
        } else {
            $cartProduct->pivot->increment('quantity');
        }
    }

    // Уменьшение количества товара в корзине
    public function subtractProduct(Product $product): void
    {
        $cartProduct = $this->findProduct($product);

        if ($cartProduct->pivot->quantity <= 1) {
            $this->getCart()->products()->detach($cartProduct->id);
        } else {
            $cartProduct->pivot->decrement('quantity');
        }
    }

    // Установка цены товара после заказа
    public function setProductsPrice(Cart $cart): void
    {
        foreach ($cart->products as $product) {
            $cart->products()->updateExistingPivot($product->id, ['price' => $product->price]);
        }
    }

    // Закрыть корзину
    public function closeCart(
        Cart $cart,
        User $user,
    ): void
    {
        $cart->update(['is_active' => false]);
        $user->carts()->create();
    }
}
