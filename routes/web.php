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

// Route::get('/login', function () {
//     return view('auth.login', ['title' => 'Login']);
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register', ['title' => 'Register']);
// })->name('register');

Route::get('/my-url', function () {
    return view('recent-url', ['title' => 'My URL']);
})->name('my.url');

Route::get('/stats', function () {
    return view('stats-url', ['title' => 'Stats URL']);
})->name('stats');

Route::get('/change-url', function () {
    return view('change-url', ['title' => 'Change URL']);
})->name('change.url');

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('auth');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class,'register'])->name('register.process');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
