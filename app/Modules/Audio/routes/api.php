<?php

use App\Modules\Audio\Http\Controllers\AudioController;
use App\Modules\Audio\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:sanctum',
], function() {

    Route::resource('playlists', PlaylistController::class)
        ->except([
            'create', 'edit',
        ]);
    
});
