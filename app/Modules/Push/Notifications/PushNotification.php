<?php

namespace App\Modules\Push\Notifications;

use App\Modules\Push\Channels\PushChannel;
use App\Modules\Push\Contracts\PushNotification as PushNotificationContract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

abstract class PushNotification extends Notification implements ShouldQueue, PushNotificationContract
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [
            'database',
            PushChannel::class,
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $message = $this->toPush($notifiable);

        return [
            'title' => $message->getTitle(),
            'type' => $message->getType(),
            'message' => $message->getMessage(),
            'image' => $message->getImage(),
            'data' => $message->getData(),
        ];
    }
}
