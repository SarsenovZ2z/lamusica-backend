<?php

namespace App\Modules\Push\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void sendToTopic(\App\Modules\Push\Contracts\PushTopic $topic, \App\Modules\Push\PushMessage $message)
 * @method static void sendToDevices(array<PushToken> $tokens, \App\Modules\Push\PushMessage $message)
 */
class Push extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'push_service';
    }

}