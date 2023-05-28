<?php

namespace App\Modules\Auth\Contracts;

interface AuthRepository
{

    public function signup(string $email, string $password): void;

    public function signin(string $email, string $password): string;
}
