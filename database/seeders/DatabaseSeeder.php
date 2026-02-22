<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::create([
            'phone' => '+7 (901) 600-83-38',
            'name' => 'Иван',
            'password' => Hash::make('12345678!'),
            'is_admin' => true,
        ]);

        $admin->carts()->create();

        $this->call([
            CategorySeeder::class,
            PublisherSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
