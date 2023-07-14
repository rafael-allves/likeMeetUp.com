<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

// Route::get('/', [EventController::class, 'index'])->name('home');
// Route::get('/events/create', [EventController::class, 'create'])
// ->middleware('auth');
// Route::get('/events/{evento}', [EventController::class, 'show']);
// Route::post('/events', [EventController::class, 'store']);
// Route::get('/events/edit/{evento}', [EventController::class, 'edit'])
// ->middleware('auth');
// Route::put('/events/update/{evento}', [EventController::class, 'update'])
// ->middleware('auth');
// Route::delete('/events/delete/{evento}', [EventController::class, 'destroy'])
// ->middleware('auth');
// Route::post('/events/join/{evento}', [EventController::class, 'joinEvent'])
// ->middleware('auth');
// Route::delete('/events/leave/{evento}', [EventController::class, 'leaveEvent'])
// ->middleware('auth');

Route::resource('events', EventController::class)->name('', 'events');

Route::resource('users', UserController::class)->name('', 'users');
Route::post('/auth/register', [UserController::class, 'register']);
Route::post('/auth/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])
->middleware('auth');
Route::get('/dashboard', [UserController::class, 'dashboard'])
->middleware('auth');