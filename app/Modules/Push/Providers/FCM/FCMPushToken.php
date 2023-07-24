<?php

namespace App\Modules\Push\Providers\FCM;

use App\Modules\Push\Contracts\PushToken;

class FCMPushToken implements PushToken
{
    public function __construct(
        protected string $token,
    ) {
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
