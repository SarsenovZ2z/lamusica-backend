<?php

namespace App\Modules\Push\Contracts;

interface PushTopic
{

    public function getKey(): string;

}