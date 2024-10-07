<?php

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

Route::get('/', function () {
    return view('clients.pages.home');
})->name('home');

Route::get('/detail', function () {
    return view('clients.pages.detail');
});

Route::get('/read_by_category', function () {
    return view('clients.pages.read_by_category');
});

Route::get('/login', function() {
    return view('clients.pages.login');
})->name('login');

Route::get('/register', function() {
    return view('clients.pages.register');
})->name('register');