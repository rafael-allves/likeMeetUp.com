<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicationController;

Route::get('/', [PublicationController::class, 'index']);

Route::resource('events', EventController::class, [
    'names' => [
        'index' => 'events',
        'store' => 'CreateEvent',
        'update' => 'UpdateEvent',
    ]
]);

Route::resource('users', UserController::class)->name('', 'users');



Route::resource('publications', PublicationController::class, [
    'names' => [
        'store' => 'CreatePublication'
    ],
]);

require __DIR__.'/auth.php';
require __DIR__.'/relations.php';
