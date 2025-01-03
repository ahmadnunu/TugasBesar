<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;

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

// Otentikasi
Auth::routes();

// Rute untuk halaman utama dan posts (hanya dapat diakses setelah login)
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});

// Rute logout
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Rute register (ini sudah otomatis ditangani oleh Auth::routes, tapi jika perlu eksplisit)
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

