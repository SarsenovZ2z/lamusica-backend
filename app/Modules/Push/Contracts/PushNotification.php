<?php

namespace App\Modules\Push\Contracts;

use App\Modules\Push\PushMessage;

interface PushNotification
{

    public function toPush(object $notifiable): PushMessage;

}
