<?php

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

Route::get('/login', function() {
    return view('clients.pages.login');
})->name('login');

Route::get('/register', function() {
    return view('clients.pages.register');
})->name('register');