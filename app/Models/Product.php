<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string|null $image
 * @property string $slug
 * @property int $category_id
 */
class Product extends Model
{
    protected $guarded = ['id'];
}
