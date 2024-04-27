<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return redirect('home'); });
Route::get('/home', HomeController::class)->name('home');

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'postRegister'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(CheckRole::Class . ':admin');


Route::middleware(['auth', CheckRole::Class . ':admin'])->prefix('dashboard')->group(function () {
    // Rutas protegidas aquí
    Route::resource('user', UserController::class);
});
