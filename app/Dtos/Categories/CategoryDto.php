<?php

namespace App\Dtos\Categories;

use App\Models\Category;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CategoryDto extends Data
{
    public function __construct(
        #[Max(50), Unique(Category::class)]
        public string $name,
    )
    {
    }
}
