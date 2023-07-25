<?php

namespace App\Modules\Push;

use App\Modules\Push\Console\Commands\PushNotificationMakeCommand;
use App\Modules\Push\PushService;
use Illuminate\Support\ServiceProvider;

class PushServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config/push.php', 'modules.push');

        $this->app->singleton('push_service', function ($app) {
            return $app->makeWith(PushService::class, [
                'config' => $app->config['modules.push'] ?? []
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PushNotificationMakeCommand::class,
            ]);
        }
    }
}
