<?php

namespace ManeOlawale\Laravel\WaabotChannel\Tests\Channel;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Mockery as Mock;
use ManeOlawale\Laravel\WaabotChannel\Tests\TestCase;
use ManeOlawale\Laravel\WaabotChannel\Tests\Entities\WaabotChannelTestNotification;
use ManeOlawale\Laravel\WaabotChannel\Tests\Entities\WaabotChannelTestNotifiable;
use ManeOlawale\Laravel\WaabotChannel\Channels\WaabotWhatsappChannel;

class WaabotWhatsappChannelTest extends TestCase
{
    public function testSmsIsSentViaWaabotChannel()
    {
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], json_encode($data = [
                //
            ])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        WaabotWhatsappChannel::clientUsing(function () use ($client) {
            return $client;
        });

        $notification = new WaabotChannelTestNotification();
        $notifiable = new WaabotChannelTestNotifiable();


        $channel = new WaabotWhatsappChannel();

        $channel->send($notifiable, $notification);
    }
}
