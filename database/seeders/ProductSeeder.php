<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        $publishers = Publisher::all();

        for ($i = 1; $i <= 20; $i++) {
            $product = Product::create([
                'name' => "Игра №{$i}",
                'slug' => "game-{$i}",
                'description' => fake()->text(),
                'short_description' => fake()->sentence(),
                'price' => fake()->randomFloat(2, 500, 5000),
                'old_price' => fake()->boolean(30) ? fake()->randomFloat(2, 600, 6000) : null,
                'stock_quantity' => fake()->numberBetween(0, 100),
                'sku' => "SKU-{$i}",
                'publisher_id' => $publishers->random()->id,
                'players_min' => fake()->numberBetween(1, 4),
                'players_max' => fake()->numberBetween(4, 8),
                'play_time' => fake()->numberBetween(30, 120),
                'age_rating' => fake()->randomElement([0, 6, 12, 16, 18]),
                'is_new' => fake()->boolean(20),
                'is_bestseller' => fake()->boolean(10),
                'image' => null,
            ]);

            $product->categories()->attach(
                $categories->random(fake()->numberBetween(1, 3))->pluck('id')
            );
        }
    }
}
