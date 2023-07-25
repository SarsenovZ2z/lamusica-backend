<?php

namespace App\Modules\Push;

use App\Modules\Push\Contracts\PushDriver;
use App\Modules\Push\Contracts\PushToken;
use App\Modules\Push\Contracts\PushTopic;

class PushService
{

    /**
     * @var array<PushDriver>
     */
    protected array $drivers;

    public function __construct(
        protected array $config,
    ) {
        $this->drivers = array_map(
            function ($driver) {
                return app()->makeWith($driver['class'], [
                    'config' => $driver['config'] ?? [],
                ]);
            },
            $this->config['drivers'] ?? []
        );
    }

    public function sendToDevices(
        array $tokens,
        PushMessage $message,
    ): void {
        foreach ($this->drivers as $driver) {
            $filteredTokens = array_filter(
                $tokens,
                fn (PushToken $token) => $driver->isValidDeviceToken($token)
            );

            if (empty($filteredTokens)) {
                continue;
            }

            $driver->sendToDevices($filteredTokens, $message);
        }
    }

    public function sendToTopic(PushTopic $topic, PushMessage $message): void
    {
        foreach ($this->drivers as $driver) {
            $driver->sendToTopic($topic, $message);
        }
    }
}
