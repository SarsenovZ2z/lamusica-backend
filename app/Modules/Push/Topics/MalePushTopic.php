<?php

namespace App\Modules\Push\Topics;

use App\Modules\Push\Contracts\PushTopic;

class MalePushTopic implements PushTopic
{

    public function getKey(): string
    {
        return 'users.male';
    }
}
