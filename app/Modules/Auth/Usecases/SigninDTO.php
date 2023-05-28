<?php

namespace App\Modules\Auth\Usecases;

class SigninDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
