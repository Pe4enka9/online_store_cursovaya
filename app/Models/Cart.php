<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property int $user_id
 * @property boolean $is_open
 *
 * @property-read Collection<Product> $products
 */
class Cart extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_open' => 'boolean',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
