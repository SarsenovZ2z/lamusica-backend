<?php

namespace App\Modules\Push\Topics;

use App\Modules\Push\Contracts\PushTopic;

class FemalePushTopic implements PushTopic
{

    public function getKey(): string
    {
        return 'users.female';
    }
}
