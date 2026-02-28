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

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', "%$request->name%");
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('publisher')) {
            $query->where('publisher_id', $request->publisher);
        }

        if ($request->filled('players_min')) {
            $query->where('players_min', '>=', $request->players_min);
        }

        if ($request->filled('players_max')) {
            $query->where('players_max', '<=', $request->players_max);
        }

        if ($request->filled('age_rating')) {
            $query->where('age_rating', $request->age_rating);
        }

        return $query;
    }
}
