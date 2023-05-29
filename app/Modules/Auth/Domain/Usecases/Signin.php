<?php

namespace App\Modules\Auth\Domain\Usecases;

use App\Modules\Auth\Domain\Repositories\AuthRepository;

class Signin
{

    public function __construct(
        private AuthRepository $authRepository,
    ) {
    }

    public function __invoke(SigninDTO $params)
    {
        return $this->authRepository
            ->signin(
                email: $params->email,
                password: $params->password,
                deviceName: $params->deviceName,
            );
    }
}
