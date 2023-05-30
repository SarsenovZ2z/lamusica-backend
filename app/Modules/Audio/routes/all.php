<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')
    ->prefix('api')
    ->as('api.')
    ->group(__DIR__ . '/api.php');
