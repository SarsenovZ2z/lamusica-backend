<?php

namespace App\Modules\Audio;

use App\Modules\Audio\Data\DataSources\AudioDataSource;
use App\Modules\Audio\Data\DataSources\AudioEloquentDataSource;
use App\Modules\Audio\Data\DataSources\PlaylistDataSource;
use App\Modules\Audio\Data\DataSources\PlaylistEloquentDataSource;
use App\Modules\Audio\Data\Repositories\AudioRepositoryImpl;
use App\Modules\Audio\Data\Repositories\PlaylistRepositoryImpl;
use App\Modules\Audio\Domain\Repositories\AudioRepository;
use App\Modules\Audio\Domain\Repositories\PlaylistRepository;
use Illuminate\Support\ServiceProvider;

class AudioServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AudioDataSource::class, function ($app) {
            return $app->make(AudioEloquentDataSource::class);
        });

        $this->app->singleton(AudioRepository::class, function ($app) {
            return $app->make(AudioRepositoryImpl::class);
        });

        $this->app->singleton(PlaylistDataSource::class, function($app) {
            return $app->make(PlaylistEloquentDataSource::class);
        });

        $this->app->singleton(PlaylistRepository::class, function($app) {
            return $app->make(PlaylistRepositoryImpl::class);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/all.php');
    }
}
