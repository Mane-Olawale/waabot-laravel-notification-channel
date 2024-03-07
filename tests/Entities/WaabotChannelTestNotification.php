<?php

namespace ManeOlawale\Laravel\WaabotChannel\Tests\Entities;

use Illuminate\Notifications\Notification;
use ManeOlawale\Laravel\WaabotChannel\Messages\WhatsappMessage;

class WaabotChannelTestNotification extends Notification
{
    public function toWaabotChannel($notifiable)
    {
        return new WhatsappMessage('Hello world');
    }
}
