<?php

namespace ManeOlawale\Laravel\WaabotChannel\Tests;

use ManeOlawale\Laravel\WaabotChannel\WaabotChannelServiceProvider;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestBench extends BaseTestCase
{
    use MockeryPHPUnitIntegration;

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('services', [
            'waabot' => [
                'url' => 'https://api.waabot.com/api/v1',
                'session_id' => 'session_id',
                'access_token' => 'access_token',
            ]
        ]);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            WaabotChannelServiceProvider::class,
        ];
    }
}
