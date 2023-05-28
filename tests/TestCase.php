<?php

namespace Beaverlabs\LaravelGG\Tests;

use Beaverlabs\LaravelGG\Exceptions\BindException;
use Beaverlabs\LaravelGG\LaravelGGServiceProvider;
use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    public function createApplication()
    {
        $app = new Application();

        $app->singleton(
            \Illuminate\Contracts\Http\Kernel::class,
            \Illuminate\Foundation\Http\Kernel::class
        );

        $app->singleton(
            \Illuminate\Contracts\Console\Kernel::class,
            \Illuminate\Foundation\Console\Kernel::class
        );

        $app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \Illuminate\Foundation\Exceptions\Handler::class
        );


        $app->register(LaravelGGServiceProvider::class);

        \Illuminate\Support\Facades\Facade::setFacadeApplication($app);

        $app->singleton('config', function ($app) {
            return new \Illuminate\Config\Repository;
        });

        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $config = $this->app->make(Repository::class);

        $config->set('database.default', 'sqlite');
        $config->set('database.connections.sqlite.database', ':memory:');
        $config->set('database.connections.sqlite.prefix', '_test');
    }
}
