<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function products(Category $category): View
    {
        $products = $category->products;

        return view('home', ['products' => $products]);
    }
}
