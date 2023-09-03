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
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('/login', function () {
    return view('auth.login', ['title' => 'Login']);
})->name('login');

Route::get('/register', function () {
    return view('auth.register', ['title' => 'Register']);
})->name('register');

Route::get('/my-url', function () {
    return view('recent-url', ['title' => 'My URL']);
})->name('my.url');

Route::get('/my-url', function () {
    return view('recent-url', ['title' => 'My URL']);
})->name('my.url');

Route::get('/stats', function () {
    return view('stats-url', ['title' => 'Stats URL']);
});
