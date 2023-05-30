<?php

use App\Modules\Audio\Http\Controllers\AudioController;
use App\Modules\Audio\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:sanctum',
], function() {
    // Route::group([
    //     'prefix' => 'audio',
    // ], function () {
    //     Route::get('', [AudioController::class, 'getCurrentUserAudios']);
    //     Route::post('', [AudioController::class, 'addAudio']);
    //     Route::delete('', [AudioController::class, 'deleteAudio']);
    // });
    
    Route::resource('playlists', PlaylistController::class)
        ->except([
            'create', 'edit',
        ]);
    
});
