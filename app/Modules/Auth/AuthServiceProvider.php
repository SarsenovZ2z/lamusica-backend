<?php

namespace App\Modules\Auth;

// use Illuminate\Support\Facades\Gate;

use App\Modules\Auth\Data\Datasources\AuthenticatableDataSource;
use App\Modules\Auth\Data\Datasources\AuthenticatableEloquentDataSource;
use App\Modules\Auth\Data\Repositories\AuthRepositoryImpl;
use App\Modules\Auth\Domain\Repositories\AuthRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        AuthRepository::class => AuthRepositoryImpl::class,
        AuthenticatableDataSource::class => AuthenticatableEloquentDataSource::class,
    ];

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/all.php');
    }
}
