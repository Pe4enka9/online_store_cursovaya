<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// Общее
Route::get('/', [HomeController::class, 'index'])->name('home');

// Неавторизованный пользователь
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

// Авторизованный пользователь
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/categories/{category:slug}/products', [CategoryController::class, 'products'])->name('categories.products');

    Route::get('/carts/{cart}', [CartController::class, 'show'])->name('carts.show');
    Route::post('/carts/{product}/add', [CartController::class, 'add'])->name('carts.add');
});

// Админ
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/products', AdminProductController::class);
    });
});
