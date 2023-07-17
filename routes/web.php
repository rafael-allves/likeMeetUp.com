<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function (){
    return Inertia::render('Home', [
        "user" => Auth::user() ?? ["user" => ""],
    ]);
});

Route::resource('events', EventController::class)->name('', 'events');
Route::controller(EventController::class)->middleware(['auth'])->group(function (){
    Route::post('/events/join/{evento}', 'joinEvent');
    Route::delete('/events/leave/{evento}', 'leaveEvent');
});

Route::resource('users', UserController::class)->name('', 'users');
Route::controller(UserController::class)->group(function (){
    Route::post('/auth/register', 'register');
    Route::post('/auth/login', 'login');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function (){
    Route::post('/logout', 'logout');
    Route::get('/dashboard', 'dashboard');
});
