<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $cart_id
 * @property float $total_price
 * @property OrderStatusEnum $status
 *
 * @property-read Cart $cart
 */
class Order extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
}
