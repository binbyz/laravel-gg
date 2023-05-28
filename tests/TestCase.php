<?php

namespace Beaverlabs\LaravelGG\Tests;

use Beaverlabs\LaravelGG\LaravelGGServiceProvider;
use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\Concerns\InteractsWithContainer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    use InteractsWithContainer;

    public function createApplication()
    {
        $app = new Application();

        $app->singleton('path.storage', function ($app) {
            return '.';
        });

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

        $app->singleton('config', function ($app) {
            return new \Illuminate\Config\Repository;
        });

        \Illuminate\Support\Facades\Facade::setFacadeApplication($app);

        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $config = $this->app->make(Repository::class);

        $config->set('app.env', 'testing');
        $config->set('database.default', 'sqlite');
        $config->set('database.connections.sqlite.database', ':memory:');
        $config->set('database.connections.sqlite.prefix', '_test');
    }
}
