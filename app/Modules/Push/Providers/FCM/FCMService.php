<?php

namespace App\Modules\Push\Providers\FCM;

use App\Modules\Push\Contracts\FCMService as FCMServiceContract;
use App\Modules\Push\Contracts\PushTopic;
use App\Modules\Push\PushMessage;
use Illuminate\Support\Facades\Http;

class FCMService implements FCMServiceContract
{

    public function __construct(
        protected array $config,
    ) {
    }

    public function sendToDevices(
        array $tokens,
        PushMessage $message,
    ): void {
        $tokens = array_filter($tokens, fn ($token) => $token instanceof FCMPushToken);
        $tokens = array_map(fn (FCMPushToken $token) => $token->getToken(), $tokens);

        if (empty($tokens)) {
            return;
        }

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
    }

    protected function request(string $url, array $data = [])
    {
        return Http::withHeaders([
            'Authorization' => "key={$this->config['api_key']}",
        ])
            ->post($url, $data)
            ->json();
    }
}
