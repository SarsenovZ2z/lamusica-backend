<?php

namespace App\Modules\Push\Contracts;

use App\Modules\Push\Contracts\PushToken;
use Illuminate\Database\Eloquent\Builder;

interface HasPushTokens
{

    /**
     * @param Builder $query
     * 
     * @return void
     */
    public function scopeWithPushTokens(Builder $query): void;

    /**
     * @return void
     */
    public function loadPushTokens(): void;

    /**
     * @param PushToken $token
     * 
     * @return void
     */
    public function setPushToken(PushToken $token): void;

    /**
     * @return array<int, PushToken>
     */
    public function getPushTokens(): array;
}
