<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UrlController;
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

/**
 * Define route needed for home page
 */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/url/store', [UrlController::class, 'store'])->name('short.url');
Route::get('/{slug}', [UrlController::class, 'redirect'])->name('redirect');

/**
 * Define route for auth process
 */
Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('auth');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class,'register'])->name('register.process');
});

/**
 * Define route only for authenticated user
 */
Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/url/my-url', [UrlController::class, 'index'])->name('my-url.index');
    Route::get('/url/my-url/stats/{slug}', [UrlController::class, 'show'])->name('my-url.show');
    Route::get('/url/my-url/stats/{slug}/edit', [UrlController::class, 'edit'])->name('my-url.edit');
    Route::delete('/url/my-url/stats/{slug}', [UrlController::class, 'destroy'])->name('my-url.destroy');
});
