<?php

namespace Beaverlabs\LaravelGG\Tests;

use Beaverlabs\LaravelGG\LaravelGGServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;

class TestCase extends \Orchestra\Testbench\TestCase
{
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

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function getEnvironmentSetUp($app)
    {
        \config()->set('app.env', 'testing');
        \config()->set('database.default', 'sqlite');
        \config()->set('database.connections.sqlite.database', ':memory:');
    }
}
