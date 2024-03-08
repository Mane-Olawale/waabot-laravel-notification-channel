<?php

namespace ManeOlawale\Laravel\WaabotChannel\Tests;

use ManeOlawale\Laravel\WaabotChannel\Messages\WhatsappMessage;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase as BaseTestCase;

class WhatsappMessageTest extends BaseTestCase
{
    use MockeryPHPUnitIntegration;

    public function testMessageContent()
    {
        $message = new WhatsappMessage('Hello World');

        $this->assertEquals('Hello World', $message->content);
    }

    public function testMessageContentByLine()
    {
        $message = new WhatsappMessage('Hello World,');
        $message->line('I am ready to take you on.');

        $this->assertEquals("Hello World,\nI am ready to take you on.", $message->getContent());
    }
}
