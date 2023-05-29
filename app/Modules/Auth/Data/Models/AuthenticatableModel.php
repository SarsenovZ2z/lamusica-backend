<?php

namespace App\Modules\Auth\Data\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

abstract class AuthenticatableModel extends Authenticatable 
{
    use HasApiTokens;

}
