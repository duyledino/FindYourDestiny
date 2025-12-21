<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\AuthenticateUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;

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
    Route::get("reset/{user_id}/{verify_token}", function () {
        return view("auth.Resetpassword");
    });
    Route::get("confirm/{user_id}/{verify_token}",[AuthController::class,'confirmRegister'])->name("confirmaccount.get");
    Route::post("reset", [AuthController::class, 'reset'])->name('resetpassword.post');
    Route::get('{provider}/redirect', [AuthController::class, 'redirect'])->name('social.redirect.get');
    Route::get("{provider}/callback", [AuthController::class, 'callback'])->name('social.callback.get');
});


Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get("/", [UserController::class, 'profile'])->name('profile.get');
    Route::get('edit/{user_id}', [UserController::class, 'getEdit'])->name('profile.edit.get');
    Route::post('edit', [UserController::class, 'edit'])->name('profile.edit.post');
});

Route::prefix('connect')->group(function () {
    Route::get("/", [DateController::class, 'connectPage'])->name('connect.get');
    Route::middleware('auth')->get("/message", [MessageController::class,'chat'])->name('message.get');
    // Route::post('/broadcast',[MessageController::class,'broadcast'])->name('broadcast.post');
    Route::middleware('auth')->post("/message", [MessageController::class,'send'])->name('message.post');
    Route::middleware('auth')->get('/setting',function(){
        return view('users.setting_user');
    })->name('setting.post');
    Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout.post');
    Route::get('checkout', function () {
        return view('connect.Checkout');
    })->name('checkout.get');
    Route::get('checkout/result', [CheckoutController::class, 'result'])->name('check.result.get');
    Route::get("filter", function () {
        return view('connect.filterConnectPage');
    })->name('filter.get');
    Route::post('filter', [DateController::class, 'filter'])->name('filter.post');
    Route::post('report',[ReportController::class,'report'])->name('report.post');
});

Route::prefix("user")->name("user.")->group(function () {
    Route::get('detail/{user_id}', [UserController::class, 'detail'])->name('detail');
    Route::middleware('auth')->post('connect', [DateController::class, 'connect'])->name('date.post');
});

