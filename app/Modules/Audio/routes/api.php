<?php

use App\Modules\Audio\Http\Controllers\AudioController;
use App\Modules\Audio\Http\Controllers\PlaylistController;
use App\Modules\Audio\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:sanctum',
], function () {
    Route::resource('audio', AudioController::class)
        ->only([
            'index', 'store', 'destroy',
        ]);
});

Route::group([
    'middleware' => 'auth:sanctum',
    'as' => 'me.',
], function () {

    Route::resource('playlist', PlaylistController::class)
        ->except([
            'create', 'edit',
        ]);

    Route::post('audio/toggle/{audio}', [UserController::class, 'toggleAudio'])
        ->name('toggleAudio');

    Route::post('playlist/{playlist}/toggle/{userAudio}', [UserController::class, 'togglePlaylistAudio'])
        ->name('togglePlaylistAudio');
});
