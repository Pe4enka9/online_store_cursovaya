<?php

namespace App\Http\Controllers\Admin;

use App\Dtos\Products\CreateProductDto;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminProductController
{
    public function index(): View
    {
        $products = Product::all();

        return view('admin.products.index', ['products' => $products]);
    }

    public function create(): View
    {
        $categories = Category::all();
        $publishers = Publisher::all();

        return view('admin.products.create', [
            'categories' => $categories,
            'publishers' => $publishers,
        ]);
    }

    public function store(CreateProductDto $dto): RedirectResponse
    {
        if ($dto->image) {
            $imageName = uniqid('product_') . '.' . $dto->image->extension();
            $path = Storage::disk('public')->putFileAs('products', $dto->image, $imageName);
        }

        $product = Product::query()->create([
            'name' => $dto->name,
            'description' => $dto->description,
            'short_description' => $dto->shortDescription,
            'price' => $dto->price,
            'image' => $path ?? null,
            'publisher_id' => $dto->publisher,
            'sku' => Str::random(),
            'slug' => Str::slug($dto->name),
        ]);

        $product->categories()->attach($dto->categories);

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
