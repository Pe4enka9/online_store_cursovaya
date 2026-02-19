<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Стратегии', 'slug' => 'strategies'],
            ['name' => 'Для вечеринок', 'slug' => 'party'],
            ['name' => 'Карточные', 'slug' => 'card-games'],
            ['name' => 'Детские', 'slug' => 'kids'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
