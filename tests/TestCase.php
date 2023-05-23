<?php

namespace Beaverlabs\LaravelGG\Tests;

use Beaverlabs\LaravelGG\LaravelGGServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected $loadEnvironmentVariables = true;

    protected function getApplicationTimezone($app)
    {
        return 'Asia/Seoul';
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelGGServiceProvider::class,
        ];
    }
}
