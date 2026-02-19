<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = [
            [
                'name' => 'Стратегии',
                'slug' => 'strategies',
            ],
            [
                'name' => 'Карточные игры',
                'slug' => 'card-games',
            ],
            [
                'name' => 'Семейные игры',
                'slug' => 'family-games',
            ],
            [
                'name' => 'Детективные игры',
                'slug' => 'detective-games',
            ],
            [
                'name' => 'Кооперативные игры',
                'slug' => 'cooperative-games',
            ],
            [
                'name' => 'Дуэльные игры',
                'slug' => 'duel-games',
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->create($category);
        }

        $products = [
            [
                'name' => 'Колонизаторы',
                'description' => 'Легендарная стратегическая игра, где игроки осваивают остров Катан, собирая ресурсы и строя поселения. Идеально подходит для компании от 3 до 4 человек.',
                'price' => 2990.00,
                'image' => 'catan.jpg',
                'slug' => 'kolonizatory',
                'category_name' => 'Стратегии',
            ],
            [
                'name' => 'Бэнг!',
                'description' => 'Динамичная карточная игра в жанре "вестерн". Игроки делятся на шерифов, бандитов и ренегатов и пытаются выполнить свои цели.',
                'price' => 1490.00,
                'image' => 'bang.jpg',
                'slug' => 'beng',
                'category_name' => 'Карточные игры',
            ],
            [
                'name' => 'Уно',
                'description' => 'Простая и увлекательная карточная игра для всей семьи. Цель игры — первым избавиться от всех карт, крикнув "Уно!"',
                'price' => 590.00,
                'image' => 'uno.jpg',
                'slug' => 'uno',
                'category_name' => 'Семейные игры',
            ],
            [
                'name' => 'Имаджинариум',
                'description' => 'Ассоциативная игра с красивыми иллюстрациями, которая раскрывает фантазию игроков. Отлично подходит для большой компании.',
                'price' => 1990.00,
                'image' => 'imaginarium.jpg',
                'slug' => 'imaginarium',
                'category_name' => 'Семейные игры',
            ],
            [
                'name' => 'Манчкин',
                'description' => 'Пародийная карточная игра в жанре фэнтези. Игроки исследуют подземелья, сражаются с монстрами и "подкладывают свинью" друг другу.',
                'price' => 1290.00,
                'image' => 'munchkin.jpg',
                'slug' => 'manchkin',
                'category_name' => 'Карточные игры',
            ],
            [
                'name' => 'Детектив: Город ангелов',
                'description' => 'Кооперативная детективная игра с уникальной атмосферой Лос-Анджелеса 40-х годов. Игрокам предстоит расследовать запутанные преступления.',
                'price' => 3490.00,
                'image' => 'detective-city-of-angels.jpg',
                'slug' => 'detective-city-of-angels',
                'category_name' => 'Детективные игры',
            ],
            [
                'name' => 'Эпичные схватки боевых магов',
                'description' => 'Дуэльная игра, где каждый игрок управляет могущественным магом и сражается на арене. Быстрая и тактическая игра для двоих.',
                'price' => 1890.00,
                'image' => 'epic-battle-mages.jpg',
                'slug' => 'epic-battle-mages',
                'category_name' => 'Дуэльные игры',
            ],
            [
                'name' => 'Пандемия',
                'description' => 'Легендарная кооперативная игра, где игроки объединяются для борьбы со смертельными заболеваниями по всему миру. Только вместе можно победить!',
                'price' => 2790.00,
                'image' => 'pandemic.jpg',
                'slug' => 'pandemiya',
                'category_name' => 'Кооперативные игры',
            ],
            [
                'name' => 'Каркассон',
                'description' => 'Классическая стратегия, где игроки по очереди выкладывают плитки местности и размещают своих подданных, чтобы зарабатывать очки.',
                'price' => 2490.00,
                'image' => 'carcassonne.jpg',
                'slug' => 'karkasson',
                'category_name' => 'Стратегии',
            ],
            [
                'name' => 'Свинтус',
                'description' => 'Весёлая карточная игра, основанная на правилах игры "Уно", но с добавлением особых карт-свинтусов, которые меняют правила игры.',
                'price' => 790.00,
                'image' => 'svintus.jpg',
                'slug' => 'svintus',
                'category_name' => 'Семейные игры',
            ],
        ];

        foreach ($products as $product) {
            $category = Category::query()->where('name', $product['category_name'])->first();

            if ($category) {
                Product::query()->create([
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'slug' => $product['slug'],
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
