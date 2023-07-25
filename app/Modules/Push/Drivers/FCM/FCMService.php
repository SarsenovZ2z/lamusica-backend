<?php

namespace App\Modules\Push\Drivers\FCM;

use App\Modules\Push\Contracts\PushDriver;
use App\Modules\Push\Contracts\PushToken;
use App\Modules\Push\Contracts\PushTopic;
use App\Modules\Push\PushMessage;
use Illuminate\Support\Facades\Http;

class FCMService implements PushDriver
{

    public function __construct(
        protected array $config,
    ) {
    }

    public function isValidDeviceToken(PushToken $token): bool
    {
        return $token instanceof FCMPushToken;
    }

    public function sendToDevices(
        array $tokens,
        PushMessage $message,
    ): void {
        if (empty($tokens)) {
            return;
        }

        $tokens = array_map(fn (FCMPushToken $token) => $token->getToken(), $tokens);


        $response = $this->request(
            'https://fcm.googleapis.com/fcm/send',
            [
                'registration_ids' => $tokens,
                'notification' => [
                    'title' => $message->getTitle(),
                    'body' => $message->getMessage(),
                    'data' => [
                        'type' => $message->getType(),
                        ...$message->getData(),
                    ],
                ],
            ]
        );
    }

    public function sendToTopic(
        PushTopic $topic,
        PushMessage $message,
    ): void {
        //
    }

    protected function request(string $url, array $data = [])
    {
        return Http::withHeaders([
            'Authorization' => "key={$this->getApiKey()}",
        ])
            ->post($url, $data)
            ->json();
    }

    protected function getApiKey()
    {
        return $this->config['api_key'];
    }
}
