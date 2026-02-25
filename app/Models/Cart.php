<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property int $user_id
 * @property boolean $is_open
 *
 * @property-read Collection<Product> $products
 * @property-read Order $order
 */
class Cart extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_open' => 'boolean',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart_products')
            ->withPivot('quantity');
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function totalPrice(): float
    {
        return $this->products->sum(function (Product $product) {
            return $product->price * $product->pivot->quantity;
        });
    }
}
