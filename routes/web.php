<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

Route::get('/home', HomeController::class)->name('home');
Route::get('/', function () {
    return redirect('home');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'postLogin');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'postRegister');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(CheckRole::Class .':admin');


Route::middleware(['auth', CheckRole::Class.':admin'])->prefix('dashboard')->group(function () {
    // Rutas protegidas aquí
    Route::resource('user', UserController::class);
    Route::resource('categoria', CategoriaController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('modelo', ModeloController::class);
});
