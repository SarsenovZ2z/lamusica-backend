<?php

namespace App\Modules\Auth;

// use Illuminate\Support\Facades\Gate;

use App\Modules\Auth\Data\DataSources\AuthenticatableDataSource;
use App\Modules\Auth\Data\DataSources\AuthenticatableEloquentDataSource;
use App\Modules\Auth\Data\Repositories\AuthRepositoryImpl;
use App\Modules\Auth\Domain\Repositories\AuthRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register services.
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(AuthenticatableDataSource::class, function ($app) {
            return $app->make(AuthenticatableEloquentDataSource::class);
        });

        $this->app->singleton(AuthRepository::class, function ($app) {
            return $app->make(AuthRepositoryImpl::class);
        });
    }

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/all.php');
    }
}
