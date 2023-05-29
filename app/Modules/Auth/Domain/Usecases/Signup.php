<?php

namespace App\Modules\Auth\Domain\Usecases;

use App\Modules\Auth\Domain\Repositories\AuthRepository;

class Signup
{

    public function __construct(
        private AuthRepository $authRepository,
    ) {
    }

    public function __invoke(SignupDTO $params)
    {
        return $this->authRepository
            ->signup(
                email: $params->email,
                password: $params->password,
            );
    }
}
