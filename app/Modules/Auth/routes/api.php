<?php

use App\Modules\Auth\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth',
], function() {
    Route::get('signup', [AuthController::class, 'signup']);
    Route::get('signin', [AuthController::class, 'signin']);
});
