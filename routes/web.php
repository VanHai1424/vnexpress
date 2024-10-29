<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/read_by_category/{id}', [HomeController::class, 'getPostByCategory'])->name('category');

Route::get('/detail/{id}', [HomeController::class, 'getDetail'])->name('detail');

Route::post('/send_comment', [HomeController::class, 'sendComment'])->name('send-comment');

// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handle-login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('handle-register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['isLogin', 'isAdmin'])->prefix('admin')->group(function() {
    Route::get('/', function() {
        return 'dashboard';
    })->name('dashboard');
});