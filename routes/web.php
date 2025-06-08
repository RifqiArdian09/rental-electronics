<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\RentalHistoryController;
use App\Http\Controllers\TestimonialController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth Routes for customer
Route::prefix('customer')->group(function () {
    Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('auth.customer-login');
    Route::post('/login', [CustomerAuthController::class, 'login']);
    Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('auth.customer-register');
    Route::post('/register', [CustomerAuthController::class, 'register']);
    Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
});

// Default login redirect route for unauthenticated access
Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
Route::get('/testimoni-home', [TestimonialController::class, 'showOnHomepage']);


// Group routes protected by customer authentication
Route::middleware('auth:customer')->group(function () {
    // Rental routes
    Route::get('/rental/{tool}/create', [RentalController::class, 'create'])->name('rental.create');
    Route::post('/rental', [RentalController::class, 'store'])->name('rental.store');

    // Rental history
    Route::get('/riwayat-sewa', [RentalHistoryController::class, 'index'])->name('rental.history');
    
    // Testimonials
    Route::get('/testimoni/buat/{rental_id}', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimoni/simpan', [TestimonialController::class, 'store'])->name('testimonials.store');
});




Route::get('/tools', [ToolsController::class, 'index'])->name('tools.index');
Route::get('/tools/search', [ToolsController::class, 'search'])->name('tools.search');
Route::get('/tools/{id}/quickview', [ToolsController::class, 'quickview'])->name('tools.quickview');
