<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PublisherSeeder extends Seeder
{
    public function run(): void
    {
        $publishers = [
            'Hobby World',
            'GaGa Games',
            'Mosigra',
            'Z-Man Games',
            'Asmodee',
            'Ravensburger',
        ];

        foreach ($publishers as $publisher) {
            Publisher::create([
                'name' => $publisher,
                'slug' => Str::slug($publisher),
            ]);
        }
    }
}
