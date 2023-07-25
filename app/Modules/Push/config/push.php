<?php

use App\Modules\Push\Drivers\APN\APNService;
use App\Modules\Push\Drivers\FCM\FCMService;

return [

    'drivers' => [
        [
            'class' => FCMService::class,
            'config' => [
                'api_key' => env('FCM_API_KEY'),
            ],
        ],
        [
            'class' => APNService::class,
            'config' => [
                'api_key' => env('APN_API_KEY'),
            ],
        ],
    ],
];
