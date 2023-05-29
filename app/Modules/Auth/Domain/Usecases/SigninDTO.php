<?php

namespace App\Modules\Auth\Domain\Usecases;

class SigninDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public string $deviceName,
    ) {
    }
}
