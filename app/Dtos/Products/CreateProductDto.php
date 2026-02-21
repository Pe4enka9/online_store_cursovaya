<?php

namespace App\Dtos\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Image;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Mimes;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CreateProductDto extends Data
{
    public function __construct(
        #[Max(50), Unique(Product::class)]
        public string        $name,
        public ?string       $description,
        public ?string       $shortDescription,
        #[Min(0)]
        public float         $price,
        #[Image, Mimes('jpg', 'jpeg', 'png'), Max(2048)]
        public ?UploadedFile $image,
        #[Exists(Publisher::class, 'id')]
        public int           $publisher,
        #[Exists(Category::class, 'id')]
        public array         $categories,
    )
    {
    }
}
