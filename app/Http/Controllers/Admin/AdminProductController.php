<?php

namespace App\Http\Controllers\Admin;

use App\Dtos\Products\CreateProductDto;
use App\Dtos\Products\UpdateProductDto;
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

        $product = Product::create([
            'name' => $dto->name,
            'description' => $dto->description,
            'short_description' => $dto->shortDescription,
            'price' => $dto->price,
            'stock_quantity' => $dto->stockQuantity,
            'image' => $path ?? null,
            'publisher_id' => $dto->publisher,
            'players_min' => $dto->playersMin,
            'players_max' => $dto->playersMax,
            'play_time' => $dto->playTime,
            'age_rating' => $dto->ageRating,
            'sku' => Str::random(),
            'slug' => Str::slug($dto->name),
        ]);

        $product->categories()->attach($dto->categories);

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product): View
    {
        $categories = Category::all();
        $publishers = Publisher::all();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'publishers' => $publishers,
        ]);
    }

    public function update(
        Product          $product,
        UpdateProductDto $dto,
    ): RedirectResponse
    {
        if ($dto->image) {
            Storage::disk('public')->delete($product->image);
            $imageName = uniqid('product_') . '.' . $dto->image->extension();
            $path = Storage::disk('public')->putFileAs('products', $dto->image, $imageName);
        }

        $product->update([
            'name' => $dto->name,
            'description' => $dto->description,
            'short_description' => $dto->shortDescription,
            'price' => $dto->price,
            'old_price' => $dto->oldPrice,
            'stock_quantity' => $dto->stockQuantity,
            'image' => $path ?? $product->image,
            'publisher_id' => $dto->publisher,
            'players_min' => $dto->playersMin,
            'players_max' => $dto->playersMax,
            'play_time' => $dto->playTime,
            'age_rating' => $dto->ageRating,
            'slug' => Str::slug($dto->name),
        ]);

        $product->categories()->sync($dto->categories);

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
