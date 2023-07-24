<?php

namespace App\Modules\Push;

use App\Modules\Push\Contracts\APNService;
use App\Modules\Push\Contracts\FCMService;
use App\Modules\Push\Contracts\PushTopic;
use App\Modules\Push\Providers\APN\APNPushToken;
use App\Modules\Push\Providers\FCM\FCMPushToken;
use Illuminate\Support\Facades\Log;

class PushService
{

    public function __construct(
        protected array $config,
        protected FCMService $fcm,
        protected APNService $apn,
    ) {
    }

    public function sendToDevices(
        array $tokens,
        PushMessage $message,
    ): void {
        $this->fcm
            ->sendToDevices($tokens, $message);

        // $this->apn
        //     ->sendToDevices($tokens, $message);
    }

    public function sendToTopic(PushTopic $topic, PushMessage $message): void
    {
        //
    }
}
