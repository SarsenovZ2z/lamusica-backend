<?php

namespace App\Modules\Auth\Repositories;

use App\Modules\Auth\Contracts\AuthRepository;
use App\Modules\Auth\Contracts\AuthenticatableDataSource;

class AuthRepositoryImpl implements AuthRepository
{

    public function __construct(
        private AuthenticatableDataSource $authenticatableDataSource,
    ) {
    }

    public function signup(
        string $email,
        string $password,
    ): void {
        $this->authenticatableDataSource
            ->createUserIfNotExists(
                email: $email,
                password: $password,
            );
    }

    public function signin(
        string $email,
        string $password,
    ): string {

        return 'token';
    }
}
