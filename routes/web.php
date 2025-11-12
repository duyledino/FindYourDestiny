<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route for user list
Route::get('/', [UserController::class, 'index'])->name("users.index");
Route::get('/create', action:  function() {
    return view('users.create_user'); // create a new Blade view
});
// Route for creating a new user
Route::post('/create', [UserController::class, 'create'])->name("users.create");
