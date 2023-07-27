<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function (){
    return Inertia::render('Home/Home', [
        "user" => Auth::user() ?? ["user" => ""],
        'status' => session('status'),
    ]);
});

Route::resource('events', EventController::class, [
    'names' => [
        'index' => 'events',
        'store' => 'CreateEvent',
    ]
]);

Route::controller(EventController::class)->middleware(['auth'])->group(function (){
    Route::post('/events/join/{evento}', 'joinEvent');
    Route::delete('/events/leave/{evento}', 'leaveEvent');
});

Route::resource('users', UserController::class)->name('', 'users');

Route::controller(UserController::class)->middleware(['auth'])->group(function (){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/auth.php';
