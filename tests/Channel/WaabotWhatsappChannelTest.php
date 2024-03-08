<?php

namespace ManeOlawale\Laravel\WaabotChannel\Tests\Channel;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use ManeOlawale\Laravel\WaabotChannel\Tests\Entities\WaabotChannelTestNotification;
use ManeOlawale\Laravel\WaabotChannel\Tests\Entities\WaabotChannelTestNotifiable;
use ManeOlawale\Laravel\WaabotChannel\Channels\WaabotWhatsappChannel;
use ManeOlawale\Laravel\WaabotChannel\Tests\TestBench;

class WaabotWhatsappChannelTest extends TestBench
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

        $this->assertInstanceOf(\Psr\Http\Message\ResponseInterface::class, $channel->send($notifiable, $notification));
    }
}
