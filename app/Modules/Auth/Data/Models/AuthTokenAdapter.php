<?php

namespace App\Modules\Auth\Data\Models;

use App\Modules\Auth\Domain\Entities\AuthToken;
use Laravel\Sanctum\NewAccessToken;

class AuthTokenAdapter
{

    public static function fromModel(NewAccessToken $model) : AuthToken
    {
        return new AuthToken(
            accessToken: $model->plainTextToken,
            refreshToken: null,
        );
    }

    public static function toArray(AuthToken $authToken) : array
    {
        return [
            'access_token' => $authToken->accessToken,
            'refresh_token' => $authToken->refreshToken,
        ];
    }
}