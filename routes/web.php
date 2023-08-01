<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicationController;

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
        'update' => 'UpdateEvent',
    ]
]);

Route::controller(EventController::class)->middleware(['auth'])->group(function (){
    Route::post('/events/join/{event}', 'joinEvent')->name('joinEvent');
    Route::post('/events/leave/{event}', 'leaveEvent')->name('leaveEvent');
});

Route::resource('users', UserController::class)->name('', 'users');

Route::resource('publications', PublicationController::class, [
    'names' => [
        'store' => 'CreatePublication'
    ],
]);

Route::controller(UserController::class)->middleware(['auth'])->group(function (){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/auth.php';
