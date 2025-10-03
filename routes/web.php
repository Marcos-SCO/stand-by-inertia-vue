<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::inertia('/about', 'About', ['user' => 'John Doe'])
    ->name('about');


Route::middleware('auth')->group(function () {

    Route::inertia('/dashboard', 'Dashboard')
        // ->middleware('auth')
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function () {

    Route::inertia('/register', 'Auth/Register')
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');

    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
