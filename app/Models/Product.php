<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $short_description
 * @property float $price
 * @property float|null $old_price
 * @property int $stock_quantity
 * @property string $sku
 * @property int $publisher_id
 * @property int|null $players_min
 * @property int|null $players_max
 * @property int|null $play_time
 * @property int $age_rating
 * @property boolean $is_new
 * @property boolean $is_bestseller
 * @property string|null $image
 * @property string $slug
 *
 * @property-read Collection<Category> $categories
 * @property-read Publisher $publisher
 */
class Product extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_new' => 'boolean',
        'is_bestseller' => 'boolean',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::get(function () {
            return $this->image
                ? Storage::disk('public')->url($this->image)
                : asset('images/no-image.png');
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
