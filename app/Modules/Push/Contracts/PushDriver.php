<?php

namespace App\Modules\Push\Contracts;

use App\Modules\Push\PushMessage;

interface PushDriver
{

    public function sendToDevices(array $tokens, PushMessage $message): void;

    public function sendToTopic(PushTopic $topic, PushMessage $message): void;

    public function isValidDeviceToken(PushToken $token): bool;

}