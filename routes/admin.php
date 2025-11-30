<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')// Optional: Adds '/admin' to all URLs in this file
    ->name('admin.') // Optional: Adds 'admin.' to route names
    ->middleware(['auth','admin'])
    ->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('reports', [AdminController::class, 'reports'])->name('reports');
    });

