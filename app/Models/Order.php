<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cart_id
 * @property float $total_price
 * @property string $status
 */
class Order extends Model
{
    protected $guarded = ['id'];
}
