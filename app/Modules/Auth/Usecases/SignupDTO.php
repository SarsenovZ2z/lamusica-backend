<?php

namespace App\Modules\Auth\Usecases;

class SignupDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
