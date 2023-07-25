<?php

namespace App\Modules\Ranking;

use Illuminate\Support\ServiceProvider;

class RankingServiceProvider extends ServiceProvider
{

    public $bindings = [
        \App\Modules\Ranking\Contracts\RankingService::class => \App\Modules\Ranking\RankingService::class,
    ];

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
        //
    }
}
