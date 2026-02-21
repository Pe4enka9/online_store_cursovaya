<?php

namespace App\Http\Controllers\Admin;

use App\Dtos\Categories\CategoryDto;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(CategoryDto $dto): RedirectResponse
    {
        Category::query()->create([
            'name' => $dto->name,
            'slug' => Str::slug($dto->name),
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(
        Category    $category,
        CategoryDto $dto,
    ): RedirectResponse
    {
        $category->update([
            'name' => $dto->name,
            'slug' => Str::slug($dto->name),
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
