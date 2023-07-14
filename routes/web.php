<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;



Route::resource('events', EventController::class)->name('', 'events');
Route::post('/events/join/{evento}', [EventController::class, 'joinEvent'])->middleware('auth');
Route::delete('/events/leave/{evento}', [EventController::class, 'leaveEvent'])->middleware('auth');

Route::resource('users', UserController::class)->name('', 'users');
Route::post('/auth/register', [UserController::class, 'register']);
Route::post('/auth/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');