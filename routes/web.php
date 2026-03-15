<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarPartController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductEnquiryController;
use App\Http\Controllers\Admin\AdminEnquiryController;
use App\Http\Controllers\UserDashboardController;
use App\Models\Product;
use App\Models\CarPart;

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

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/how-to-buy', function () {
    return view('frontend.how-to-buy');
})->name('how-to-buy');

Route::get('/testimonials', function () {
    return view('frontend.testimonials');
})->name('testimonials');

// Deals page (active deals for products & car parts)
Route::redirect('/deal', '/deals');
Route::get('/deals', function () {
    $now = now();

    $dealProducts = Product::where('is_available', true)
        ->where('is_deal', true)
        ->where(function ($q) use ($now) {
            $q->whereNull('deal_starts_at')
              ->orWhere('deal_starts_at', '<=', $now);
        })
        ->where(function ($q) use ($now) {
            $q->whereNull('deal_ends_at')
              ->orWhere('deal_ends_at', '>=', $now);
        })
        ->latest()
        ->take(24)
        ->get();

    $dealCarParts = CarPart::where('is_available', true)
        ->where('is_deal', true)
        ->where(function ($q) use ($now) {
            $q->whereNull('deal_starts_at')
              ->orWhere('deal_starts_at', '<=', $now);
        })
        ->where(function ($q) use ($now) {
            $q->whereNull('deal_ends_at')
              ->orWhere('deal_ends_at', '>=', $now);
        })
        ->latest()
        ->take(24)
        ->get();

    return view('frontend.deals', compact('dealProducts', 'dealCarParts'));
})->name('deals');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/verify-otp', [AuthController::class, 'showVerifyOtpForm'])->name('verify-otp.show');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify-otp');
    Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('resend-otp');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('reset-password.show');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Test Email Route (Remove in production)
Route::get('/test-email', [\App\Http\Controllers\TestEmailController::class, 'test'])->name('test-email');

// Dashboard Routes (protected - auth only)
Route::middleware('auth')->group(function () {
    // Admin Dashboard (requires view dashboard permission)
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->middleware('permission:view dashboard')->name('admin.dashboard');
    
    // User Dashboard (for all authenticated users)
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

// Products Routes (Public)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Product Enquiry Routes
Route::post('/products/{product}/enquiry', [ProductEnquiryController::class, 'store'])->name('products.enquiry.store');

Route::middleware('auth')->group(function () {
    Route::get('/enquiries', [ProductEnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('/enquiries/datatable', [ProductEnquiryController::class, 'datatable'])->name('enquiries.datatable');
    Route::get('/enquiries/{enquiry}', [ProductEnquiryController::class, 'show'])->name('enquiries.show');
});

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
        Route::put('/products/{product}/toggle-visibility', [ProductController::class, 'toggleVisibility'])->name('products.toggle-visibility');
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

        // Enquiries Management Routes (Admin only)
        Route::get('/enquiries', [AdminEnquiryController::class, 'index'])->name('enquiries.index');
        Route::get('/enquiries/datatable', [AdminEnquiryController::class, 'datatable'])->name('enquiries.datatable');
        Route::get('/enquiries/{enquiry}', [AdminEnquiryController::class, 'show'])->name('enquiries.show');
        Route::put('/enquiries/{enquiry}/status', [AdminEnquiryController::class, 'updateStatus'])->name('enquiries.update-status');
    });
});

// Example routes with permission-based access
Route::middleware(['auth', 'permission:create posts'])->group(function () {
    Route::get('/posts/create', function () {
        return 'Create Post Page';
    })->name('posts.create');
});
