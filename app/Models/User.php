<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $phone
 * @property string $name
 * @property string $password
 * @property boolean $is_admin
 *
 * @property-read Collection<Cart> $carts
 * @property-read Cart $cart
 */
class User extends Authenticatable
{
    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class)->where('is_open', true);
    }
}
