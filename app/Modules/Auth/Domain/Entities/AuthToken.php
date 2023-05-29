<?php

namespace App\Modules\Auth\Domain\Entities;

class AuthToken
{
    public function __construct(
        public string $accessToken,
        public ?string $refreshToken = null,
    ) {
    }
}
