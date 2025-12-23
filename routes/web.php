<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarPartController;
use App\Http\Controllers\SliderController;

// Frontend Pages
Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/services', function () {
    return view('frontend.services');
})->name('services');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard Route (protected - requires view dashboard permission)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'permission:view dashboard'])->name('dashboard');

// Products Routes (Public)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Car Parts Routes (Public)
Route::get('/car-parts', [CarPartController::class, 'index'])->name('car-parts.index');
Route::get('/car-parts/{carPart}', [CarPartController::class, 'show'])->name('car-parts.show');

// User Management Routes (Admin only)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class);
    
    // Product Management Routes (Admin only)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/products/datatable', [ProductController::class, 'datatable'])->name('products.datatable');
        
        // Car Parts Management Routes (Admin only)
        Route::get('/car-parts/create', [CarPartController::class, 'create'])->name('car-parts.create');
        Route::post('/car-parts', [CarPartController::class, 'store'])->name('car-parts.store');
        Route::get('/car-parts/{carPart}/edit', [CarPartController::class, 'edit'])->name('car-parts.edit');
        Route::put('/car-parts/{carPart}', [CarPartController::class, 'update'])->name('car-parts.update');
        Route::delete('/car-parts/{carPart}', [CarPartController::class, 'destroy'])->name('car-parts.destroy');
        Route::get('/car-parts/datatable', [CarPartController::class, 'datatable'])->name('car-parts.datatable');

        // Slider Management Routes (Admin only)
        Route::resource('sliders', SliderController::class)->except(['show']);
    });
});

// Example routes with permission-based access
Route::middleware(['auth', 'permission:create posts'])->group(function () {
    Route::get('/posts/create', function () {
        return 'Create Post Page';
    })->name('posts.create');
});
