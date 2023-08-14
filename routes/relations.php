<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicationController;

Route::controller(EventController::class)->middleware(['auth'])->group(function (){
    Route::post('/events/join/{event}', 'joinEvent')->name('joinEvent');
    Route::post('/events/leave/{event}', 'leaveEvent')->name('leaveEvent');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function (){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});