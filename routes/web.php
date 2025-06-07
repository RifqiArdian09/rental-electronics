<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToolsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [ToolsController::class, 'index'])->name('home');