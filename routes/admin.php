<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')// Optional: Adds '/admin' to all URLs in this file
    // ->name('admin.') // Optional: Adds 'admin.' to route names
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', function () {
            return redirect(route('dashboard.get'));
        });
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard.get');
        Route::get('reports', [AdminController::class, 'reports'])->name('reports.get');
        Route::get('user', [AdminController::class, 'add_user_get'])->name('add_user.get');
        Route::get('user/add', [AdminController::class, 'add_user_get'])->name('add_user.get');
        Route::get('user/{user_id}', [AdminController::class, 'detail_user'])->name('detail_user.get');
        Route::post('update_detail_user', [AdminController::class, 'update_detail_user'])->name('detail_user.post');
        Route::post('user', [AdminController::class, 'add_user_post'])->name('add_user.post');
        Route::get('review_report/{report_id}', [AdminController::class, 'review_report'])->name('review_report.get');
        Route::post('review_report', [AdminController::class, 'submit_report'])->name('review_report.post');
        Route::post('ban_user', [AdminController::class, 'ban_user_in_report'])->name('ban_user.post');
        Route::get('chats', [AdminController::class, 'chats'])->name('chats.get');
        Route::get('chats/{chat_id}', [AdminController::class, 'chat_message'])->name('chat_message.get');
    });

