<?php

namespace App\Modules\Push\Contracts;

use App\Modules\Push\Providers\FCM\FCMPushToken;
use App\Modules\Push\PushMessage;

interface FCMService
{

    /**
     * @param array<FCMPushToken> $tokens
     * @param PushMessage $message
     * 
     * @return void
     */
    public function sendToDevices(
        array $tokens,
        PushMessage $message,
    ): void;

    /**
     * @param PushTopic $topic
     * @param PushMessage $message
     * 
     * @return void
     */
    public function sendToTopic(
        PushTopic $topic,
        PushMessage $message,
    ): void;
}
