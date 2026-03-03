<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductService
{
    public function filter(Request $request): Builder
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', "%$request->search%");
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('categories')) {
            $categories = $request->categories;

            $query->whereHas('categories', function (Builder $q) use ($categories) {
                $q->whereIn('categories.id', $categories);
            });
        }

        if ($request->filled('publishers')) {
            $query->whereIn('publisher_id', $request->publishers);
        }

        if ($request->filled('players_min')) {
            $query->where('players_min', '>=', $request->players_min);
        }

        if ($request->filled('players_max')) {
            $query->where('players_max', '<=', $request->players_max);
        }

        if ($request->filled('age_rating')) {
            $query->where('age_rating', '>=', $request->age_rating);
        }

        if ($request->filled('play_time')) {
            $query->where('play_time', '<=', $request->play_time);
        }

        return $query;
    }
}
