<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group(function (){
    Route::post('/auth/register', 'register')->name('register');
    Route::post('/auth/login', 'login')->name('login');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function (){
    Route::get('/logout', 'logout');
    Route::get('/dashboard', 'dashboard');
});