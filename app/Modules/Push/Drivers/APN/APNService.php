<?php

namespace App\Modules\Push\Drivers\APN;

use App\Modules\Push\Contracts\PushDriver;
use App\Modules\Push\Contracts\PushToken;
use App\Modules\Push\Contracts\PushTopic;
use App\Modules\Push\PushMessage;

class APNService implements PushDriver
{

    public function __construct(
        protected array $config,
    ) {
    }

    public function isValidDeviceToken(PushToken $token): bool
    {
        return $token instanceof APNPushToken;
    }

    public function sendToDevices(
        array $tokens,
        PushMessage $message,
    ): void {
    }

    public function sendToTopic(
        PushTopic $topic,
        PushMessage $message,
    ): void {
    }
}
