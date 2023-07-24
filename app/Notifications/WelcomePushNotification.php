<?php

namespace App\Notifications;

use App\Modules\Push\Notifications\PushNotification;
use App\Modules\Push\PushMessage;

class WelcomePushNotification extends PushNotification
{

    public string $param;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $param)
    {
        $this->param = $param;
    }

    /**
     * @param object $notifiable
     * 
     * @return PushMessage
     */
    public function toPush(object $notifiable): PushMessage
    {
        return new PushMessage(
            title: 'Welcome',
            message: 'Message example',
            type: 'welcome',
            data: [
                'key1' => 'val1',
            ],
        );
    }

}
