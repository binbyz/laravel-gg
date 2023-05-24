<?php

namespace Beaverlabs\LaravelGG\Tests;

use Beaverlabs\LaravelGG\LaravelGGServiceProvider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
//use PHPUnit\Framework\TestCase as PHPUnitTestCase;
//use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

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
