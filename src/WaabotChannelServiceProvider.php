<?php

namespace ManeOlawale\Laravel\WaabotChannel;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;

class WaabotChannelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('waabot_whatsapp', function () {
                return new Channels\WaabotWhatsappChannel();
            });
        });
    }

    /**
     * Boot the provider
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
