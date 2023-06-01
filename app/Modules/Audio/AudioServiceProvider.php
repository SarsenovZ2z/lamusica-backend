<?php

namespace App\Modules\Audio;

use Illuminate\Support\ServiceProvider;

class AudioServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/all.php');
    }
}
