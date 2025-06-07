<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\RentalController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth Routes
Route::prefix('customer')->group(function () {
    Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('auth.customer-login');
    Route::post('/login', [CustomerAuthController::class, 'login']);
    Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('auth.customer-register');
    Route::post('/register', [CustomerAuthController::class, 'register']);
    Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
});

// Tambahkan route alias agar Laravel tahu ke mana redirect saat auth gagal
Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');

Route::middleware(['auth:customer'])->group(function () {
    Route::get('/rental/{tool}/create', [RentalController::class, 'create'])->name('rental.create');
    Route::post('/rental', [RentalController::class, 'store'])->name('rental.store');
});
