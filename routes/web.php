<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DateController;
use App\Http\Middleware\AuthenticateUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route for user list
// Route::get('/', [UserController::class, 'index'])->name("users.index");
Route::get("/", [UserController::class, 'homepage'])->name('homepage.get');

Route::get("/login", function () {
    return view('auth.Login');
})->name('login.get');

Route::post("/login", [AuthController::class, 'login'])->name('login.post');

Route::get("/register", function () {
    return view("auth.Register");
})->name('register.get');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get("/logout", [AuthController::class, 'logout'])->name('logout.get');

Route::prefix("login")->group(function () {
    Route::get("forget", function () {
        return view("auth.Forgetpassword");
    })->name('forgetpassword.get');
    Route::post("forget", [AuthController::class, 'forget'])->name("forgetpassword.post");
    Route::get("reset/{user_id}", function () {
        return view("auth.Resetpassword");
    });
    Route::post("reset", [AuthController::class, 'reset'])->name('resetpassword.post');
});


Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get("/", [UserController::class, 'profile'])->name('profile.get');
    Route::get('edit/{user_id}', [UserController::class, 'getEdit'])->name('profile.edit.get');
    Route::post('edit', [UserController::class, 'edit'])->name('profile.edit.post');
});

Route::prefix('connect')->group(function () {
    Route::get("/", function () {
        return view("connect.Connect");
    })->name('connect.get');

    Route::get("/message", function () {
        return view("Message");
    })->name('message.get');
    Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout.post');
    Route::get('checkout', function(){
        return view('connect.Checkout');
    })->name('checkout.get');
    Route::get('checkout/result',[CheckoutController::class,'result'])->name('check.result.get');
});

Route::prefix("user")->name("user.")->group(function () {
    Route::get('detail/{user_id}', [UserController::class, 'detail'])->name('detail');
    Route::middleware('auth')->post('connect', [DateController::class, 'connect'])->name('date.post');
});

// Route::get('/create', action: function () {
//     return view('users.create_user'); // create a new Blade view
// });
// // Route for creating a new user
// Route::post('/create', [UserController::class, 'create'])->name("users.create");
// Route::delete('/{user_id}/delete', [UserController::class, 'delete'])
//     ->name('users.delete');