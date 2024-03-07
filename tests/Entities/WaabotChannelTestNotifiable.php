<?php

namespace ManeOlawale\Laravel\WaabotChannel\Tests\Entities;

use Illuminate\Notifications\Notifiable;

class WaabotChannelTestNotifiable
{
    use Notifiable;

    public $phone = '5555555555';

    public function routeNotificationForWaabotWhatsapp($notification)
    {
        return $this->phone;
    }
}
