<?php

namespace App\Services\Carts;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;

class CartService
{
    // Получить текущую корзину
    private function getCart(): Cart
    {
        return auth()->user()->cart;
    }

    // Найти товар в текущей корзине
    private function findProduct(Product $product): ?CartProduct
    {
        $cart = $this->getCart();

        return CartProduct::query()
            ->where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();
    }

    // Создать товар в текущей корзине
    private function createProduct(
        Cart    $cart,
        Product $product,
    ): void
    {
        CartProduct::query()->create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
        ]);
    }

    // Получение количества товара в корзине
    public function getProductQuantity(Product $product): ?int
    {
        return $this->findProduct($product)?->quantity;
    }

    // Добавление товара в корзину
    public function addProduct(Product $product): void
    {
        $cart = $this->getCart();
        $cartProduct = $this->findProduct($product);

        if (!$cartProduct) {
            $this->createProduct($cart, $product);
        } else {
            $cartProduct->increment('quantity');
        }
    }

    // Уменьшение количества товара в корзине
    public function subtractProduct(Product $product): void
    {
        $cartProduct = $this->findProduct($product);

        if ($this->getProductQuantity($product) <= 1) {
            $cartProduct->delete();
        } else {
            $cartProduct->decrement('quantity');
        }
    }
}
