<?php

namespace App\Modules\Push\Channels;

use App\Modules\Push\Contracts\HasPushTokens;
use App\Modules\Push\Contracts\PushNotification;
use App\Modules\Push\Contracts\PushTopic;
use App\Modules\Push\Facades\Push;

class PushChannel
{

    public function send($notifiable, PushNotification $notification)
    {
        $message = $notification->toPush($notifiable);

        if ($notifiable instanceof HasPushTokens) {

            Push::sendToDevices($notifiable->getPushTokens(), $message);
        } else if ($notifiable instanceof PushTopic) {

            Push::sendToTopic($notifiable, $message);
        } else {
            // TODO: throw an exception
            return;
        }
    }
}
