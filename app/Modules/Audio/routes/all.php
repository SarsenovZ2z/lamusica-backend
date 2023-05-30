<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')
    ->prefix('api')
    ->group(__DIR__ . '/api.php');
